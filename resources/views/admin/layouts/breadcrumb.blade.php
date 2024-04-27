<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin-dashboard') }}" class="text-muted text-hover-primary">
            Home
        </a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        User Management
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        {{ _($module_details['page_title']) }}
    </li>
{{--
    <button type="button" class="btn btn-primary btn-lg"
        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">
        <span class="indicator-label">
            Log In
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button> --}}
</ul>
<!--end::Breadcrumb-->
