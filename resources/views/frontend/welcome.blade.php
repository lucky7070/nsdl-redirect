@extends('layouts.frontend')

@section('content')
    <div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.pan.utiitsl.com/PAN/resources/images/common.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.pan.utiitsl.com/PAN/resources/images/common.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.pan.utiitsl.com/PAN/resources/images/common.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container">
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <img class="mw-100 my-3" src="{{ asset('assets/img/pan-service-portal.png') }}" alt="PAN Service Portal">
            <p class="fs-5 text-body-secondary">Apply for PAN Card as an Indian Citizen/NRI</p>
        </div>

        <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 shadow-sm rounded-4 text-white">
                    <a href="{{ route('create-pan')  }}" class="card-body text-decoration-none rounded-4 bg-theme">
                        <h4 class="my-3 fw-normal">Apply for New PAN Card (Form 49A)</h4>
                        <button type="button" class="w-100 btn btn-lg border text-white">Apply Now</button>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 shadow-sm rounded-4 text-white">
                    <a href="{{ route('create-pan')  }}" class="card-body text-decoration-none rounded-4 bg-theme">
                        <h4 class="my-3 fw-normal">Correction in your existing PAN (Form 49A)</h4>
                        <button type="button" class="w-100 btn btn-lg border text-white">Apply Now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection