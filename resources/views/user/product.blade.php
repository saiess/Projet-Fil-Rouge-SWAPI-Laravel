@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
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
                <li class="navi_list-item"><a href="{{ route('post.index') }}" class="li-a_nav">Swap</a></li>
                @auth
                    @if(Auth::user()->role === "user")
                        <li class="navi_list-item"><a href="{{ route('profile',Auth::user()->id) }}" class="li-a_nav">Profile</a></li>
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
                <li class="navi_list-item"><a href="{{ route('faqs') }}" class="li-a_nav">FAQs</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="product-show">
        <div class="product-zone">
          <div class="pic-div">
            <img src="{{asset('upload/posts/'. $singlposts->image)}}" alt="" class="the-pic" />
          </div>

          <div class="info-zone">
            <h1 class="title-pic">{{$singlposts->title}}</h1>

                      <p class="discreption-pic">{{$singlposts->description}}</p>

                      <p style="font-weight: 600">Caregory: <span style="font-weight: normal">{{$categorypost[0]->name}}</span></p>

            <div class="btn_product">

                <form action="{{ route('favpost', ['idpost'=>($singlposts)]) }}" method="GET" class="wishlist">
                    @csrf
                    <button style="border: none; background-color: transparent;">
                        <span><img src="{{asset('image/like.svg')}}" alt="" style="width: 20px; margin-right:10px" /></span>
                        Favourites
                    </button>
                </form>

              <button class="share">
                <span><svg
                  id="Capa_1"
                  enable-background="new 0 0 512 512"
                  height="512"
                  viewBox="0 0 512 512"
                  width="512"
                  xmlns="http://www.w3.org/2000/svg"
                  style="width: 20px; fill: #180C9A; height: 40px; margin-right:10px"
                >
                  <path
                    d="m391 332c-24.15 0-46.107 9.564-62.288 25.1l-96.254-59.633c5.492-12.728 8.542-26.747 8.542-41.467s-3.05-28.739-8.543-41.466l96.254-59.633c16.182 15.535 38.139 25.099 62.289 25.099 49.626 0 90-40.374 90-90s-40.374-90-90-90-90 40.374-90 90c0 14.651 3.521 28.495 9.758 40.732l-94.001 58.238c-19.276-23.184-48.321-37.97-80.757-37.97-57.897 0-105 47.103-105 105s47.103 105 105 105c32.436 0 61.481-14.786 80.757-37.97l94.001 58.238c-6.237 12.237-9.758 26.081-9.758 40.732 0 49.626 40.374 90 90 90s90-40.374 90-90-40.374-90-90-90zm0-302c33.084 0 60 26.916 60 60s-26.916 60-60 60-60-26.916-60-60 26.916-60 60-60zm-255 301c-41.355 0-75-33.645-75-75s33.645-75 75-75 75 33.645 75 75-33.645 75-75 75zm255 151c-33.084 0-60-26.916-60-60s26.916-60 60-60 60 26.916 60 60-26.916 60-60 60z"
                  /></svg
              ></span>
                Share
              </button>

              <button class="report">
                <i class="fas fa-flag" style="font-size:20px; margin-right:10px"></i> Report
              </button>

            </div>

            <button class="call" id="popContact">
              <span><img src="{{asset('image/call.png')}}" alt="" style="width: 30px; margin-bottom: 5px"/></span>
              SHOW CANTACT INFO
            </button>

          </div>
        </div>
      </div>
    </section>

    <!-- Modal show cantact -->
    <div class="overlay" id="overlay2" style="display: none">
      <div class="popup">
        <div class="d-flex justify-content-end w-100">
          <span id="closeX2" class="btnX">X</span>
        </div>
        <div class="edit-info">
          <h1 style="text-align: center">Contact User</h1>
          <div class="show-contact">
            <img src="{{asset('image/Calling.svg')}}" alt="" style="width: 16em" />
            <p class="show-p">Email: <span>{{$postuser[0]->email}}</span></p>
            <p class="show-p">Phone: <span>{{$postuser[0]->phone}}</span></p>

              @if ($postuser[0]->user_id != (Auth::user()->id))
                  <a href="{{ route('otherprofile', ['id' => $postuser[0]->id]) }}" class="show-a"><span>view profile</span></a>
              @elseif($postuser[0]->user_id == Auth::user()->id)
                  <a href="{{ route('profile',Auth::user()->id) }}" class="show-a"><span>view profile</span></a>
              @endif

          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
    @include('layouts.footer')
@endsection


