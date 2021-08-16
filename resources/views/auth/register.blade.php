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
              <a href="{{ route('login') }}" id="log-a">Log in</a>
          </div>

          <div class="container-fluid second-nav" data-aos="fade-down"
          data-aos-easing="linear"
          data-aos-duration="2500">
            <h4>Sign up to Swapi</h4>
          </div>

          <div class="container-fluid p-0">
              <div class="container d-flex justify-content-center align-items-center flex-column log-in w-50">
                  <div class="svg-sign" data-aos="zoom-out"
                  data-aos-easing="linear"
                  data-aos-duration="1500">
                      <img src="{{asset('image/sign-cuate.svg')}}" alt="" style="width: 20em;">
                    </div>

                  <form action="{{ route('register') }}" class="form-sign" method="POST">
                      @csrf
                  <h3 class="pt-4" style="text-align: center; font-size: 22px; margin-top: 5px;">Create an Account</h3>
                  <div class="input-dev">
                    <input type="text" name="name" id="" class="input-log"/>
                    <label for="" class="label-log">Name</label>
                </div>
                      <div class="input-dev">
                          <input type="email" name="email" id="" class="input-log"/>
                          <label for="" class="label-log">email</label>
                      </div>
                      <div class="input-dev">
                          <input type="password" name="password" id="" class="input-log"/>
                          <label for="" class="label-log">password</label>
                    </div>
                    <div class="input-dev">

                        <select name="city" id="" class="input-log">
                            <option value="city"></option>
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="Tanger">Tanger</option>
                            <option value="agadir">Agadir</option>
                            <option value="marrakesh">Marrakesh</option>
                        </select>
                        <label for="" class="label-log">City</label>
                    </div>
                    <div class="input-dev">
                        <input type="number" name="phone" id="" class="input-log" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                               required/>
                        <label for="" class="label-log">Phone</label>
                    </div>
{{--                      <input type="submit" class="btn-log w-100" value="Sign up"/>--}}
                  <button type="submit" class="btn-log w-100">Sign up</button>

                  <!-- <a href="">Already have an account? </a> -->
                </form>
              </div>
          </div>
      </div>
@endsection


