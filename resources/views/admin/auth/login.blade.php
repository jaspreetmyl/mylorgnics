@extends('admin.layouts.login-master')
@section('content')
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">

                    <!--begin::Form-->
                    <form class="form w-100" method="post" novalidate="novalidate" id="kt_sign_in_form"
                        action="{{ route('authenticate') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <img src="https://www.mylorganics.com/backend/uploads/files/logo/164b8-myl-networks.gif"
                                width="130px" alt="" srcset="">
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                Login to account
                            </h1>
                            <!--end::Title-->

                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                Enter your email and password
                            </div>
                            <!--end::Subtitle--->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Login options-->
                        <!-- <div class="row g-3 mb-9">
                                                <div class="col-md-6">
                                                    <a href="#"
                                                        class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                                        <img alt="Logo" src="../../../backend/media/svg/brand-logos/google-icon.svg"
                                                            class="h-15px me-3" />
                                                        Sign in with Google
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#"
                                                        class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                                        <img alt="Logo" src="../../../backend/media/svg/brand-logos/apple-black.svg"
                                                            class="theme-light-show h-15px me-3" />
                                                        <img alt="Logo" src="../../../backend/media/svg/brand-logos/apple-black-dark.svg"
                                                            class="theme-dark-show h-15px me-3" />
                                                        Sign in with Apple
                                                    </a>
                                                </div>
                                            </div> -->
                        <!--end::Login options-->

                        <!--begin::Separator-->
                        <!-- <div class="separator separator-content my-14">
                                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                                            </div> -->
                        <!--end::Separator-->
                        @include('admin.message')
                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control bg-transparent" />
                            <!--end::Email-->
                        </div>

                        <!--end::Input group--->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group--->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>

                            <!--begin::Link-->
                            <a href="reset-password.html" class="link-primary">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">


                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Log In
                                </span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>

                        </div>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Not a Member yet?

                            <a href="sign-up.html" class="link-primary">
                                Sign up
                            </a>
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->

        </div>
        <!--end::Body-->

        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
            style="background-image: url(../../../backend/media/misc/auth-bg.png)">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <!-- <a href="../../../index.html" class="mb-0 mb-lg-12">
                                        <img alt="Logo" src="../../../backend/media/logos/custom-1.png" class="h-60px h-lg-75px" />
                                    </a> -->
                <!--end::Logo-->

                <!--begin::Image-->
                <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                    src="../../../backend/media/misc/auth-screens.png" alt="" />
                <!--end::Image-->

                <!--begin::Title-->
                <!-- <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                                        Fast, Efficient and Productive
                                    </h1> -->
                <!--end::Title-->

                <!--begin::Text-->
                <div class="d-none d-lg-block text-white fs-base text-center">
                    In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                        blogger</a>

                    introduces a person they’ve interviewed <br /> and provides some background information about

                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>
                    and their <br /> work following this is a transcript of the interview.
                </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
@endsection
