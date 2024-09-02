@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Success and Error Messages -->
    <div class="row justify-content-center">
        @if(Session::has('success'))
        <div class="alert alert-success col-md-8">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger col-md-8">{{ Session::get('error') }}</div>
        @endif
    </div>

    <!-- Update Profile Section -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="card-title">Update your profile</h2>
                <form action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profile_pic">Profile Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic">
                            <label class="custom-file-label" for="profile_pic">Choose file</label>
                        </div>
                        @if(auth()->user()->profile_pic)
                        <img src="{{ Storage::url(auth()->user()->profile_pic) }}" width="150"
                            class="mt-3 rounded-circle">
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group mt-4 text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Change Password Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="card-title">Change your password</h2>
                <form action="{{ route('user.password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="current_password">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                    <div class="form-group mt-4 text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Resume Section -->
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="card-title">Update your resume</h2>
                <form action="{{ route('upload.resume') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="resume">Upload a Resume</label>
                        <div class="custom-file">
                            <input type="file" name="resume" class="custom-file-input" id="resume">
                            <label class="custom-file-label" for="resume">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mt-4 text-center">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
