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

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../../index.html" class="text-muted text-hover-primary">
                                Home
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            User Management </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            {{ _($module_details['page_title']) }} </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span
                                    class="path2"></span>
                            </i>
                            Filter
                        </a>
                        <!--end::Menu toggle-->



                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_6512da0af0d59">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->


                            <!--begin::Form-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Status:</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <div>
                                        <select class="form-select form-select-solid" multiple data-kt-select2="true"
                                            data-close-on-select="false" data-placeholder="Select option"
                                            data-dropdown-parent="#kt_menu_6512da0af0d59" data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Member Type:</label>
                                    <!--end::Label-->

                                    <!--begin::Options-->
                                    <div class="d-flex">
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2"
                                                checked="checked" />
                                            <span class="form-check-label">
                                                Customer
                                            </span>
                                        </label>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold">Notifications:</label>
                                    <!--end::Label-->

                                    <!--begin::Switch-->
                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked />
                                        <label class="form-check-label">
                                            Enabled
                                        </label>
                                    </div>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset</button>

                                    <button type="submit" class="btn btn-sm btn-primary"
                                        data-kt-menu-dismiss="true">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                    </div>
                    <!--end::Filter menu-->


                    <!--begin::Secondary button-->
                    <!--end::Secondary button-->

                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app">
                        Create </a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl">
                <form method="post" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="card card-flush py-4 mb-5">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Permissions Informations</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Permissions Title</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="permission_title" class="form-control mb-2"
                                    placeholder="Enter Permission title" value="">
                                <!--end::Input-->

                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Guard Name</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="permission_gaurd_title" class="form-control mb-2"
                                    placeholder="Enter Guard title" value="">
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Enter Guard Name which prefer to the identity of action.</div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">GUARD TYPE</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="permission_gaurd_type" class="form-control mb-2"
                                    placeholder="Enter Guard title" value="">
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Enter Guard of Phase for Admin/Web.</div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">GROUP TITLE</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="permission_group_title" class="form-control mb-2"
                                    placeholder="Enter Guard title" value="">
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">Enter Group Title Belongs to the Main Controller.</div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->

                        </div>

                        <!--end::Card header-->
                        <div class="card-footer d-flex justify-content-start py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">
                                Save Changes
                            </button>
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
