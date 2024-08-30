@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3 class="text-center text-success mb-4">Find Your Next Employer</h3>

    <div class="row">
        @foreach(\App\Models\User::where('user_type','employer')->take(6)->orderBy('id','DESC')->get() as $employer)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($employer->profile_pic)
                            <a href="{{route('company',[$employer->id])}}">
                                <img src="{{Storage::url($employer->profile_pic)}}" width="50"
                                    class="rounded-circle border border-success">
                            </a>
                            @else
                            {{-- <a href="{{route('company',[$employer->id])}}">
                                <img src="icons8-amazon-60.png" width="50" class="rounded-circle border border-success">
                            </a> --}}
                            @endif
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0">{{$employer->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <section class="text-center mb-4">
        <p class="lead">
            <a href="/login" class="btn btn-success btn-lg px-4">Sign In</a>
            or
            {{-- <a href="/register" class="text-success">Register</a> to manage your profile and start applying for jobs. --}}

            <p>
                Register as a
                <a href="/register/seeker" class="text-success">Job Seeker</a>
                or an
                <a href="/register/employer" class="text-success">Employer</a>
                to manage your profile and start applying for jobs.
            </p>
        </p>
    </section>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-success">Recommended Jobs</h4>
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_high_to_low'])}}">High to Low Salary</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_low_to_high'])}}">Low to High Salary</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'latest'])}}">Latest</a>
                </li>
                <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'oldest'])}}">Oldest</a>
                </li>
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Fulltime'])}}">Fulltime</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Parttime'])}}">Parttime</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        @foreach($jobs as $job)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <img class="rounded-circle border border-success mb-3" width="50"
                        src="{{Storage::url($job->profile->profile_pic)}}" alt="{{$job->profile->name}}" />
                    <h5 class="card-title">{{$job->title}}</h5>
                    <p class="card-text text-muted">{{$job->profile->name}}</p>
                    <p class="card-text">{{$job->address}}</p>
                    <p class="card-text text-success fw-bold">${{number_format($job->salary,2)}}</p>
                    <a href="{{route('job.show',[$job->slug])}}" class="btn btn-success btn-sm">Apply Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <h3 class="text-center text-success mb-4">Recent Openings</h3>
    @foreach(\App\Models\Listing::take(3)->orderBy('id','DESC')->get() as $listing)
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">{{$listing->title}}</h5>
                    <span class="badge bg-secondary">{{$listing->job_type}}</span>
                    <span class="badge bg-success">${{number_format($listing->salary,2)}}</span>
                </div>
                <a href="{{route('job.show',$listing->slug)}}" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<footer class="text-white text-center bg-dark py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <h5>About Company</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>Search Something</h5>
                <div class="form-outline mb-4">
                    <input type="text" id="formControlLg" class="form-control form-control-lg bg-light text-dark"
                        placeholder="Search" />
                </div>
                <ul class="fa-ul">
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-home"></i></span> Addis Ababa, Ethiopia</li>
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-envelope"></i></span> info@techjobs.com</li>
                    <li><span class="fa-li"><i class="fas fa-phone"></i></span> +123456789</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>Opening Hours</h5>
                <table class="table text-white">
                    <tbody>
                        <tr>
                            <td>Mon - Thu:</td>
                            <td>8am - 8pm</td>
                        </tr>
                        <tr>
                            <td>Fri - Sat:</td>
                            <td>8am - 1am</td>
                        </tr>
                        <tr>
                            <td>Sunday:</td>
                            <td>9am - 10pm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center py-2" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Tech Jobs
    </div>
</footer>

<style>
    body {
        background-color: #f4f4f4;
    }

    .badge.bg-success {
        background-color: #28a745;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .text-success {
        color: #28a745 !important;
    }

    .card {
        border-radius: 10px;
        background-color: #fff;
    }

    .card-body {
        padding: 1.5rem;
    }

    .form-control-lg {
        padding: 10px;
    }

    footer {
        background-color: #212529;
        color: #fff;
    }

    footer h5 {
        margin-bottom: 1rem;
    }
</style>

@endsection
