@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-success">Looking for an employee?</h1>
            <h3 class="text-dark">Please create an account</h3>
            <img src="/it-engineer-working-with-his-pc.jpeg" width="580" class="img-fluid">
        </div>

        <div class="col-md-6 mt-5 mb-5">
            <div class="card" id="card" style="margin-top:50px; border: 1px solid #28a745;">
                <div class="card-header" style="background-color: #28a745; color: #fff;">Register</div>
                <form action="#" method="post" id="registrationForm">
                    <div class="card-body" style="background-color: #f9f9f9;">
                        <div class="form-group mb-3">
                            <label for="name" class="text-dark">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                style="border-color: #28a745;" required>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="text-dark">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-sm"
                                style="border-color: #28a745;" required>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm"
                                style="border-color: #28a745;" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-5 mt-3">
                            <button class="btn btn-success btn-sm" id="btnRegister">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="message" class="mt-2"></div>
        </div>
    </div>
</div>

<script>
    var url = "{{ route('store.employer') }}";
    document.getElementById("btnRegister").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default form submission
        var form = document.getElementById("registrationForm");
        var card = document.getElementById("card");
        var messageDiv = document.getElementById('message');
        messageDiv.innerHTML = '';
        var formData = new FormData(form);

        var button = event.target;
        button.disabled = true;
        button.innerHTML = 'Sending email....';

        fetch(url, {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        }).then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error');
            }
        }).then(data => {
            button.innerHTML = 'Register';
            button.disabled = false;
            messageDiv.innerHTML = '<div class="alert alert-success">Registration was successful. Please check your email to verify it.</div>';
            card.style.display = 'none';
        }).catch(error => {
            button.innerHTML = 'Register';
            button.disabled = false;
            messageDiv.innerHTML = '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
        });
    });
</script>

@endsection
