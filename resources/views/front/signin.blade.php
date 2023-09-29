@extends('front/layout')

@section('konten')
    <!-- testing setetes ora bunting -->
    <style>
        @font-face {
            font-family: HelveticaNeue;
            src: url(https://indracostore.com/assets/fonts/HelveticaNeue.woff2);
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: HelveticaNeueMedium;
            src: url(https://indracostore.com/assets/fonts/HelveticaNeue.woff2);
            font-weight: 500;
            font-style: normal;
        }
         @font-face {
            font-family: "gothamBook";
            src: url("public/assets/fonts/gotham-book-webfont.woff") format("woff");
            font-weight: 400;
        }

        @font-face {
            font-family: "gothamMedium";
            src: url("public/assets/fonts/gotham-medium-webfont.woff") format("woff");
            font-weight: 500;
        }

        @font-face {
            font-family: "gothamBold";
            font-weight: 700;
            src: url("public/assets/fonts/Gotham-Bold.woff") format("woff");
        }

        </style>
    <section>
        <div class="col-md-4 col-xl-4 container">

            <div class="lh-sm mb-2 text-center">
                {{-- <strong class="gotham-bold  fs-2 fs-lg-3">Welcome.!</strong> --}}
                <img src="{{ URL::asset('assets/frontend/')}}/images/logo.png" alt="" height="50"
                {{-- <img src="{{ URL::asset('/assets/images/iris.png') }}" alt="" --}}
                class="logo logo-dark mb-3">
                <p class="mb-5" style="font-size: 15px;"><b>Desa Nambak</b><br>
            </div>

          

            <form method="POST" action="{{ route('login') }}">
            @csrf

                <div class="form-floating border-bottom mb-3">

                    <input type="text" class="form-control border-0 rounded-0 px-0 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email', '') }}" id="email" placeholder="Enter Email address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="px-0 opacity-50" for="email">Email Address</label>
                </div>

                <div class="input-group border-bottom mb-4 mb-lg-5 flex-nowrap">
                    <div class="form-floating w-100">
                        {{-- <input type="password" class="form-control border-0 px-0" id="signinPass" placeholder="Password"> --}}

                        <input type="password" class="form-control border-0 px-0 @error('password') is-invalid @enderror"
                            value="" name="password" id="userpassword" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <label for="userpassword" class="px-0 opacity-50">Password</label>
                    </div>
                    <button class="btn border-0 bi bi-eye d-none"></button>
                    <button class="btn border-0 bi bi-eye-slash"></button>
                </div>

                <div class="mt-3 text-end">
                    <button class="btn btn-dark w-100" type="submit">Masuk</button>
                </div>

            </form>

            <div class="form-group text-center">
                <div class="container-fluid px-0 mb-3 mb-md-4 d-none">
                    <div class="row justify-content-center justify-content-lg-around" style="font-size: 150%;">
                        <div class="col-2 col-lg-4">
                            <a href="#" target="_blank" class="text-dark d-lg-none"><i class="bi bi-google"></i></a>
                            <a href="#" target="_blank" class="media align-items-center p-3 d-none d-lg-flex"
                                style="background-color: #f1f2f2; color: #565656; border-radius: 10px; text-decoration: none; line-height: 1;">
                                <i class="bi bi-google mx-3"></i>
                                <div class="media-body" style="font-size: 22px;">
                                    Sign In with Google
                                </div>
                            </a>
                        </div>

                        <div class="col-2 col-lg-4">
                            <a href="#" target="_blank" class="text-dark d-lg-none"><i class="bi bi-facebook"></i></a>
                            <a href="#" target="_blank" class="media align-items-center p-3 d-none d-lg-flex"
                                style="background-color: #f1f2f2; color: #565656; border-radius: 10px; text-decoration: none; line-height: 1;">
                                <i class="bi bi-facebook mx-3"></i>
                                <div class="media-body" style="font-size: 22px;">
                                    Sign In with Faccebook
                                </div>
                            </a>
                        </div>

                        <div class="col-2 col-lg-4">
                            <a href="#" target="_blank" class="text-dark d-lg-none"><i class="bi bi-apple"></i></a>
                            <a href="#" target="_blank" class="media align-items-center p-3 d-none d-lg-flex"
                                style="background-color: #f1f2f2; color: #565656; border-radius: 10px; text-decoration: none; line-height: 1;">
                                <i class="bi bi-apple mx-3"></i>
                                <div class="media-body" style="font-size: 22px;">
                                    Sign In with Apple
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
