<!--====================================-->
<!--////////////  nav-menu ////////////-->
<!--====================================-->

<div class="d-flex flex-wrap gap-3 justify-content-start">

    <a href="{{ route('admin.student.profile.index', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.index') ? 'active' : '' }}">
        Edit Profile
    </a>

    <a href="{{ route('admin.student.profile.document', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.document') ? 'active' : '' }}">
        Documents
    </a>

    <a href="{{ route('admin.student.profile.generatepayslip', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.generatepayslip') ? 'active' : '' }}">
        Generate Pay Slip
    </a>

    <a href="{{ route('admin.student.profile.submitfeereceipt', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.submitfeereceipt') ? 'active' : '' }}">
        Submit Fee Receipts
    </a>

    <a href="{{ route('admin.student.profile.promote', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.promote') ? 'active' : '' }}">
        Promote Student
    </a>

    <a href="{{ route('admin.student.profile.deactivate', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.deactivate') ? 'active' : '' }}">
        Deactivate Student
    </a>

    <a href="{{ route('admin.student.profile.archive', $admissionApplication->id) }}"
        class="custom-btn menuBtn {{ request()->routeIs('admin.student.profile.archive') ? 'active' : '' }}">
       Archive Student
    </a>

</div>
