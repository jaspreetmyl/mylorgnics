@extends('admin.layouts.master')

@section('styles')
@endsection
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        {{ _($module_details['page_title']) }} List
                    </h1>
                    <!--end::Title-->
                    @include('admin.layouts.breadcrumb')
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl">
                @include('admin.message')
                <form method="post" action="{{ route('admin-user.update',$user->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card card-flush py-4 mb-5">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Add User Information</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Name</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name"
                                    value="{{ $user->name }}">
                                {{-- <div class="text-muted fs-7">Enter Guard of Phase for Admin/Web.</div> --}}
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Email</label>
                                <input type="text" name="email" class="form-control mb-2" placeholder="Enter Email"
                                    value="{{ $user->email }}">
                            </div>
                            {{-- <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Password</label>
                                <input type="text" name="password" class="form-control mb-2" placeholder="Enter Password"
                                    value="{{ $user->password }}">
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control mb-2"
                                    placeholder="Enter Confirm Password" value="">
                            </div> --}}
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Is Allowed</label>
                                <select class="form-select" name="is_allowed" aria-label="Select example">
                                    <option value="1" {{ $user->is_allowed == 1 ? 'checked' : '' }}>Allowed</option>
                                    <option value="0" {{ $user->is_allowed == 0 ? 'checked' : '' }}>Banned</option>
                                </select>
                            </div>
                            <div class="card-footer d-flex justify-content-start py-6 px-0">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--end::Javascript-->
@endsection

@section('scripts')
@endsection
