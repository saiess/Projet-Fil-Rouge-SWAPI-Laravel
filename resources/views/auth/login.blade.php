@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
      <div class="container-fluid position-relative p-0">
          <div class="container-fluid nav-log" data-aos="fade-down"
          data-aos-easing="linear"
          data-aos-duration="500">
              <a href="{{ route('home') }}">
                <img src="{{asset('image/LogoBOLD.svg')}}" alt="" id="logo" />
              </a>
              <a href="{{ route('register') }}" id="log-a">Sign Up</a>
          </div>

          <div class="container-fluid second-nav" data-aos="fade-down"
          data-aos-easing="linear"
          data-aos-duration="2500">
            <h4>Login to Swapi</h4>
          </div>

          <div class="container-fluid p-0">
              <div class="container d-flex justify-content-center align-items-center flex-column log-in w-50 ">
                  <div class="svg-log" data-aos="fade-up"
                  data-aos-easing="linear"
                  data-aos-duration="1500">
                      <img src="{{asset('image/pe.svg')}}" alt="">
                    </div>
                    <form action="{{ route('login') }}" class="form-log" method="Post">
                        @csrf
                    <div class="btns-cont">
                    <button class="btns-api"><img src="{{asset('image/google.svg')}}" alt="" style="width:20px; padding-bottom: 3px;"> Google</button>
                    <button class="btns-api"><img src="{{asset('image/twitter.svg')}}" alt="" style="width:22px; padding-bottom: 3px;"> Twitter</button>
                  </div>
                  <p>or</p>

                      <div class="input-dev">
                          <input type="email" name="email" id="" class="input-log"/>
                          <label for="" class="label-log">email</label>
                      </div>
                      <div class="input-dev">
                          <input type="password" name="password" id="" class="input-log"/>
                          <label for="" class="label-log">password</label>
                    </div>

                  <button class="btn-log w-100">Login</button>

                  <a href="">Forgot your password ?</a>
                </form>
              </div>
          </div>
      </div>
@endsection

