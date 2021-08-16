@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/FAQs.css') }}">
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

        <!-- toggle hammer icone section -->
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

      <div class="container d-flex justify-content-center flex-column align-items-center div-FAQimage">
        <img src="{{asset('image/FAQ.svg')}}" alt="" class="img_FAQ" />
        <div>
            <h1>HELP CENTRE</h1>
            <hr style="border:2px solid #ff1902;">
        </div>
      </div>
    </section>

      <div class="container FAQ-show">
        <div class="questions">
          <div class="Q-div">
            <p class="Q-p">
              How to Post ?
              <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i>
            </p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">
              How to Post ?
              <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i>
            </p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
          <div class="Q-div">
            <p class="Q-p">How to Post ? <i
                class="fas fa-chevron-down"
                style="font-size: 15px; color: royalblue; padding-top: 6px"
              ></i></p>
            <p class="answers">
              Select from the following list of Product and Technical FAQs.
              Browse through these FAQs to find answers to commonly raised
              questions
            </p>
          </div>
        </div>

        <form action="" method="post" class="form_center">
          <h3 style="text-align: center">Got more! send us a message</h3>
          <input
            type="email"
            name=""
            id=""
            class="form-control input-center"
            placeholder="email@exemple.com"
          />
          <input
            type="text"
            class="form-control input-center"
            placeholder="subject"
          />
          <textarea
            name=""
            id=""
            cols="30"
            rows="10"
            class="form-control input-center"
            placeholder="write here"
          >
          </textarea>
          <input
            type="submit"
            value="Send"
            class="form-control submit-center"
          />
        </form>
      </div>


    @include('layouts.footer')
@endsection

