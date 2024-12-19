@extends('layoutDashboard')

@section('konten')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile Saya</h1>
</div>
    
    <!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
            </div>
            <div class="card-body">
                <p>Update your account's profile information and email address.</p>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
            </div>
            <div class="card-body">
                <p>Ensure your account is using a long, random password to stay secure.</p>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Project Card Example -->
        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delete Account</h6>
            </div>
            <div class="card-body">
                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                @include('profile.partials.delete-user-form')
            </div>
        </div> --}}
    </div>
</div>

</div>

</div>

@endsection