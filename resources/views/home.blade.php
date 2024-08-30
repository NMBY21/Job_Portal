@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-3">
    <h3 class="text-success mb-4">Find Your Next Employer</h3>

    <div class="row">
        @foreach(\App\Models\User::where('user_type','employer')->take(6)->orderBy('id','DESC')->get() as $employer)
        <div class="col-md-4">
            <div class="card p-3 mb-4 shadow-sm border-0 bg-dark text-white">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @if($employer->profile_pic)
                            <a href="{{route('company',[$employer->id])}}">
                                <img src="{{Storage::url($employer->profile_pic)}}" width="50" class="rounded-circle border border-success">
                            </a>
                            @else
                            <a href="{{route('company',[$employer->id])}}">
                                <img src="icons8-amazon-60.png" class="rounded-circle border border-success">
                            </a>
                            @endif
                        </div>
                        <div class="ms-3 c-details">
                            <h6 class="mb-0">{{$employer->name}}</h6>
                        </div>
                    </div>
                    <div class="badge bg-success text-white">Design</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <section class="text-center mb-4">
        <p class="lead text-dark">
            <a href="/login">
                <button class="btn btn-success px-4">Sign in</button>
            </a>
            or Register to manage your profile, start applying for jobs.
        </p>
    </section>

    <div class="d-flex justify-content-between mt-5 mb-3">
        <h4 class="text-success">Recommended Jobs</h4>

        <div class="btn-group">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter by Salary
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_high_to_low'])}}">High to Low</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_low_to_high'])}}">Low to High</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter by Date
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'latest'])}}">Latest</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'oldest'])}}">Oldest</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter by Job Type
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Fulltime'])}}">Fulltime</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Parttime'])}}">Parttime</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Casual'])}}">Casual</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Contract'])}}">Contract</a></li>
            </ul>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($jobs as $job)
        <div class="col-md-3">
            <div class="card p-3 mb-4 shadow-sm border-0 bg-dark text-white">
                <div class="text-end">
                    <small class="badge bg-success text-white">{{$job->job_type}}</small>
                </div>
                <div class="text-center mt-3">
                    <img class="rounded-circle border border-success" width="50" src="{{Storage::url($job->profile->profile_pic)}}" />
                    <h5 class="mt-3">{{$job->title}}</h5>
                    <hr class="bg-light">
                    <p>{{$job->profile->name}}</p>
                    <p>{{$job->address}}</p>
                    <div class="d-flex justify-content-between mt-3">
                        <span class="text-success">${{number_format($job->salary,2)}}</span>
                        <a href="{{route('job.show',[$job->slug])}}">
                            <button class="btn btn-success">Apply Now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <h3 class="text-success mb-4">Recent Openings</h3>
    @foreach(\App\Models\Listing::take(3)->orderBy('id','DESC')->get() as $listing)
    <div class="card mb-4 shadow-sm border-0 bg-dark text-white">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="h5">{{$listing->title}}</h4>
                    <span class="badge bg-secondary">{{$listing->job_type}}</span>
                    <span class="badge bg-success">${{number_format($listing->salary,2)}}</span>
                </div>
                <div>
                    <a href="{{route('job.show',$listing->slug)}}" class="btn btn-success">View</a>
                </div>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>Search Something</h5>
                <div class="form-outline mb-4">
                    <input type="text" id="formControlLg" class="form-control form-control-lg bg-light text-dark" placeholder="Search" />
                </div>
                <ul class="fa-ul">
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-home"></i></span> Melbourne, Australia</li>
                    <li class="mb-3"><span class="fa-li"><i class="fas fa-envelope"></i></span> info@techjobs.com</li>
                    <li><span class="fa-li"><i class="fas fa-phone"></i></span> +123456789</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>Opening Hours</h5>
                <table class="table text-white">
                    <tbody>
                        <tr><td>Mon - Thu:</td><td>8am - 9pm</td></tr>
                        <tr><td>Fri - Sat:</td><td>8am - 1am</td></tr>
                        <tr><td>Sunday:</td><td>9am - 10pm</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center py-2" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Tech Jobs
    </div>
</footer>

<style>
    body {
        background-color: #f9f9f9;
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
    }

    .form-control-lg {
        padding: 10px;
    }
</style>
@endsection
