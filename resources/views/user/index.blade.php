@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <section class="bg-purple d-flex flex-column">
      <div class="d-flex justify-content-between">
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
                          <li class="navi_list-item"><a href="{{ route('profile') }}" class="li-a_nav">Profile</a></li>
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


      <div class="container-fluid d-flex align-items-end first-div">
          <div class="title-div">
            <h1 data-aos="zoom-in"
            data-aos-easing="ease-in-back"
            data-aos-delay="500"
            data-aos-offset="0" class="big-title">Don't <span style="color: #ff1902; text-shadow: 0px 0px 2px white;">shop</span> it</h1>

            <h1 class="big-title" data-aos="zoom-in"
            data-aos-easing="ease-in-back"
            data-aos-delay="500"
            data-aos-offset="0"> <span style="color: #ff1902; text-shadow: 0px 0px 2px white;">Swop</span> it.</h1>

            <p>the sharing economy is a new socio-economic model that is
              revolitionzing the consumption of goods and services.</p>
            <a href="swap.blade.php" class="title-a">Swap</a>
          </div>

          <div class="div-hero">
            <div class="hero-back" data-aos="zoom-out" data-aos-duration="1500"></div>
            <img src="{{asset('image/hero.png')}}" alt="" class="img-hero" data-aos="zoom-out" data-aos-duration="3000">
          </div>
      </div>

      <a href="#new" class="btn-scroll">
        <img src="{{asset('image/sta.gif')}}" alt=""/>
      </a>


      <div class="bg-image object-fit-cover" style="background-image: url('{{ asset('image/bottom.png')}}');"></div>
    </section>
    <section class="container" id="new">
      <div class="container new-pro d-flex flex-column align-items-center">
        <div class="title-new">
          <h1>Recent Products</h1>
        </div>
      </div>

      <div class="container product-pic">
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
      </div>

      <div class="btns">
        <a href="swap.blade.php" class="btn1">view more</a>
      </div>
    </section>

    <section class="container-fluid d-flex justify-content-between about-tm">
      <img src="{{asset('image/i2.png')}}" alt="" class="swapimg1"  data-aos="fade-right"
      data-aos-offset="500"
      data-aos-easing="ease-in-sine" />
      <div class="textabout">
        <p data-aos="zoom-out">
          the sharing economy is a new socio-economic model that is
          revolitionzing the consumption of goods and services. this place is a
          modernized barter trading application which allow users to exchange
          items for somthing they would like to have. here users can find the
          oppoertunity to negogiate and chat about items and also allows users
          to form their community based on their perference or areas of intersts.
        </p>
      </div>
      <img src="{{asset('image/i1.png')}}" alt="" class="swapimg2" data-aos="fade-left"
      data-aos-offset="500"
      data-aos-easing="ease-in-sine" />
    </section>

    <section id="demos" class="container-fluid d-flex flex-column slid-content">
      <div class="category-title">
        <h1>Swap by Category</h1>
      </div>
      <div id="app">
        <div class="slider">
          <div class="slider-wrapper">
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(237, 220, 124)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/electronic.jpg')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(52, 240, 225)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/clothes.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(206, 16, 13)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/art.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(44, 119, 169)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/pets.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(112, 200, 223)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/sport.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(185, 136, 61)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/house.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(67, 44, 135)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/automoto.png')}}" alt="" style="width: 98%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(185, 173, 56)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/construction.png')}}" alt="" style="width: 100%;"></a>
              </div>
            </div>
            <div class="slider-element slide">
              <div class="card" style="background-color: rgb(228, 184, 44)">
                <a href="swap.blade.php"><img src="{{asset('image/categories/Food.png')}}" alt="" style="width: 100%;"></a>
              </div>
            </div>
          </div>
        </div>
    </section>

@include('layouts.footer')
@endsection
