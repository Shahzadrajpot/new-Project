@extends('app')
@section('title', $title ?? 'Details')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">{{ $heading }}</h3>

    <div class="card">
        <div class="card-body">

            @foreach ($fields as $label => $value)
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">{{ $label }}:</div>
                    <div class="col-md-8">{{ $value }}</div>
                </div>
            @endforeach

            <a href="{{ $backUrl }}" class="btn btn-secondary mt-3">
                Back
            </a>

        </div>
    </div>

</div>
@endsection
