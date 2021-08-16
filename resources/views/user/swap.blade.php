@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/swap.css') }}">
@endpush
@section('content')
    <section class="contianer-fluid d-flex flex-column h-100vh" data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="1500">
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
      <section class="container">
          <div class="signboard">
            <div class="div_textswap">
              <p>Ready to</p>
              <h1>Find products</h1>
              <h1>For swap</h1>
            </div>
            <div class="div_imgswap">
              <img src="{{asset('image/hands.svg')}}" alt="" style="width: 100%;">
            </div>
          </div>
          <div class="container-fluid cat-div mt-5">
            <h1 class="cat-title">Choose Category</h1>

            <ul class="cat-seconddiv">
              <li class="active_type type all_items">All</li>
              <li class="type Electronics">Electronics</li>
              <li class="type Fashion">Fashion</li>
              <li class="type Health">Art</li>
              <li class="type Auto">Auto</li>
              <li class="type Sports">Sports</li>
              <li class="type Home">Home</li>
              <li class="type Pets">Pets</li>
              <li class="type construction">construction</li>
              <li class="type Food">Food</li>
          </ul>
          </div>
      </section>
    </section>

    <section class="container-fluid mb-5">
        <div class="container-fluid new-pro">
            <h1>Products</h1>
        </div>

        <div class="container-fluid product-pic">
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="{{ route('products.index') }}"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
            <!-- <a href="product.blade.php" class="view">View</a> -->
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>

          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>

          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="y" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
          </div>
          <div class="z" data-aos="fade-up" data-aos-duration="2000">
            <a href="product.blade.php"><img src="{{asset('image/cap.png')}}" alt="" class="img-product"></a>
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
@endsection


