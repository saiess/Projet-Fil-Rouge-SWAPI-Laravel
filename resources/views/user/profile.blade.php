@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"/>
@endpush
@section('content')
    <section
      class="contianer-fluid d-flex flex-column h-100vh"
      data-aos="fade-down"
      data-aos-easing="linear"
      data-aos-duration="1500"
    >
      <div class="d-flex justify-content-between nav-log">
        <a href="{{ route('home') }}">
          <img src="{{asset('image/LogoBOLD.svg')}}" alt="" id="logo" />
        </a>

        <!-- toggle hammer icon section -->
        <div class="menu-icon">
          <span class="menu-icon_line menu-icon_line-left"></span>
          <span class="menu-icon_line"></span>
          <span class="menu-icon_line menu-icon_line-right"></span>
        </div>
        <!-- menu navigation -->
        <div class="navi">
          <div class="navi_content">
            <ul class="navi_list">
                <li class="navi_list-item"><a href="{{ route('home') }}" class="li-a_nav">Home</a></li>
                <li class="navi_list-item"><a href="{{ route('swap.index') }}" class="li-a_nav">Swap</a></li>
                @auth
                    @if(Auth::user()->role === "user")
                <li class="navi_list-item"><a href="{{ route('profile.index') }}" class="li-a_nav">Profile</a></li>
                    @endif
                @endauth
                @guest
                    <li class="navi_list-item"><a href="{{ route('login') }}" class="li-a_nav">Account</a></li>
                @endguest
                @auth
                    @if(Auth::user()->role === "admin")
                        <li class="navi_list-item"><a href="{{ route('admin.index') }}" class="li-a_nav">Admin</a></li>
                    @endif
                @endauth
                <li class="navi_list-item"><a href="{{ route('faqs.index') }}" class="li-a_nav">FAQs</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="user-show">
        <div class="user-zone">
          <div class="manage-user">
              <form action="{{ route('logout') }}" class="setting" method="POST">
                  @csrf
                  <button style="background:transparent; border:none;">
                      <img src="{{asset('image/logout.svg')}}" alt="" style="width: 32px; margin-left:24px" />
                  </button>
              </form>

              <div>
                  <button id="popFav" class="setting">
                      <img src="{{asset('image/wish.png')}}" alt="" style="width: 36px" />
                  </button>
                  <button id="popSetting" class="setting">
                      <img src="{{asset('image/settings.svg')}}" alt="" style="width: 30px" />
                  </button>
              </div>
          </div>

          <div class="user-info">
            <div class="info-zone">
              <h1 class="user-name">{{Auth::user()->name}}</h1>
              <div class="mb-2">
                <p class="discreption-pic">
                  <i class="fas fa-calendar-week"></i> on swapi since {{Auth::user()->created_at}}
                </p>

                <p class="discreption-pic">
                  <i class="fas fa-map-marker-alt"></i> {{Auth::user()->city}}
                </p>
              </div>

              <div class="mb-4">
                <p style="font-weight: 600">Want to exchange for: </p>
                <div class="interest">
                    <p class="p-interest">electronics</p>
                    <p class="p-interest">food</p>
                    <p class="p-interest">button</p>
                    <p class="p-interest">popContact</p>
{{--                    @foreach($categories as $category)--}}
{{--                        <p class="p-interest">{{$categories->name}}</p>--}}
{{--                    @endforeach--}}
                </div>
              </div>
              <div>
                <button class="call" id="popContact">
                  <span
                    ><img
                      src="{{asset('image/call.png')}}"
                      alt=""
                      style="width: 30px; margin-bottom: 5px"
                  /></span>
                  SHOW CONTACT INFO
                </button>
              </div>
            </div>
            <div class="user-pic">
              <img src="{{Auth::user()->photo}}" alt="" class="the-pic" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- #######profile modals####### -->
    <!-- Modal User setting -->
    <div class="overlay" id="overlay" style="display: none">
      <div class="popup">
        <div class="d-flex justify-content-end w-100">
          <span id="closeX" class="btnX">X</span>
        </div>
        <div class="edit-info">
          <h1 style="text-align: center">User settings:</h1>
          <form action="{{ route('userupdate') }}" method="post" class="form-edit">
              @csrf
            <label for="">User Name</label>
            <input type="text" name="name" class="form-control mb-3" placeholder="edit name" value="{{Auth::user()->name}}"/>
            <label for="">City</label>
              <select name="city" id="" class="form-control mb-3">
                  <option value="city">{{Auth::user()->city}}</option>
                  <option value="casablanca">Casablanca</option>
                  <option value="rabat">Rabat</option>
                  <option value="Tanger">Tanger</option>
                  <option value="agadir">Agadir</option>
                  <option value="marrakesh">Marrakesh</option>
              </select>
            <label for="">Phone Number</label>
            <input type="text" name="phone" class="form-control mb-3" placeholder="edit phone number" value="{{Auth::user()->phone}}"/>
            <label for="">Interests</label>
            <select name="skills" id="" multiple="" class="label ui selection fluid dropdown">
                <option value="">Choose interest</option>
                @foreach($categories as $key => $category)
                <option value="{{$key}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="" class="mt-3">profile photo</label>
            <input type="file" name="photo" class="form-control mb-3" value="{{Auth::user()->photo}}"/>
            <input type="submit" value="Save changes" class="inbtn mb-3" />
          </form>
        </div>
      </div>
    </div>
    <!-- end modal -->

    <!-- Modal Favourites -->
    <div class="overlay" id="overlay1" style="display: none">
      <div class="popup">
        <div class="d-flex justify-content-end w-100">
          <span id="closeX1" class="btnX">X</span>
        </div>
        <div class="edit-info">
          <h1 style="text-align: center">Your Favourites</h1>
          <div class="fav-div">
            <div class="w" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
            <div class="v" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
            <div class="w" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
            <div class="v" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
            <div class="w" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
            <div class="v" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
              <a href="product.blade.php" class="viewf">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->

    <!-- Modal show cantact -->
    <div class="overlay" id="overlay2" style="display: none">
      <div class="popup">
        <div class="d-flex justify-content-end w-100">
          <span id="closeX2" class="btnX">X</span>
        </div>
        <div class="edit-info">
          <h1 style="text-align: center">Contact User</h1>
          <div class="show-contact">
            <img src="{{asset('image/Calling.svg')}}" alt="" style="width: 22em" />
            <p class="show-p">Email: <span>{{Auth::user()->email}}</span></p>
            <p class="show-p">Phone: <span>{{Auth::user()->phone}}</span></p>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->

    <!-- Modal ADD YOUR OFFER -->
    <div class="overlay" id="overlay3" style="display: none">
      <div class="popup">
        <div class="d-flex justify-content-end w-100">
          <span id="closeX3" class="btnX">X</span>
        </div>
        <div class="edit-info">
          <h1 style="text-align: center">Add Offer</h1>
          <form action="" method="post" class="Add-offer">
            <label for="addoffer" class="labelAdd"><i class="fas fa-folder-plus"></i>Add Item picture</label>
            <input type="file" name="" id="addoffer" style="display: none;">
            <input type="text" name="" id="" class="form-control" placeholder="Add Title">
            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Add Discreaption"></textarea>
            <select name="" id="" class="form-control">Category</select>
            <input type="submit" value="Add" class="btnAdd">
          </form>
        </div>
      </div>
    </div>
    <!-- end modal -->
<!-- ########End profile modals####### -->

    <div class="container d-flex justify-content-between">
      <h3>All User Name Exchange Items:</h3>
      <button class="call" id="popAdd">
        <span
          ><img src="{{asset('image/plus.png')}}" alt="" style="width: 30px; margin-bottom: 5px"
        /></span>
        ADD YOUR OFFER
      </button>
    </div>

    <section class="container-fluid all-items">
      <div class="item-zone">
        <div class="container product-pic">
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>

          <div class="z" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
              <img src="{{asset('image/cap.png')}}" alt="" class="img-product" />
            <a href="product.blade.php" class="view">View</a>
            <a href="" class="deletePost">Delete</a>
          </div>
        </div>
      </div>
    </section>

    <section class="btns">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </section>

@include('layouts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
    <script>
        $(".label.ui.dropdown").dropdown();

        $(".no.label.ui.dropdown").dropdown({
            useLabels: false,
        });

        $(".ui.button").on("click", function () {
            $(".ui.dropdown").dropdown("restore defaults");
        });
    </script>
@endsection


