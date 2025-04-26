@extends('layouts.frontend')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center gap-3"
        style="min-height:calc(100vh - 100px)">
        <h1 class='text-center'>Online Pancard Apply</h3>
            <a href="{{ route('create-pan') }}" class="apply-button-link">
                <button type="button" class="apply-button">Apply Now</button>
            </a>
    </div>
@endsection