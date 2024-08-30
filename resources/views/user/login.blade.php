@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Login Form Section -->
        <div class="col-md-8 col-lg-6">
            <!-- Adjusted column width -->
            <div class="card shadow" style="border: 1px solid #28a745; border-radius: 10px;">
                <div class="card-header text-center"
                    style="background-color: #28a745; color: #fff; border-radius: 10px 10px 0 0;">
                    Login
                </div>
                <form action="{{ route('login.post') }}" method="post" id="loginForm" class="p-4">
                    @csrf
                    <div class="card-body" style="background-color: #f9f9f9;">
                        <div class="form-group mb-3">
                            <label for="email" class="text-dark">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                style="border-color: #28a745;" required>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                style="border-color: #28a745;" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group text-center mb-4">
                            <button class="btn btn-success" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
