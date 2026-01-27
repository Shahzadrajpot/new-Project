@extends('app')


@section('title', 'Task Details')
{{-- @section('title', 'Homepage') --}}
{{-- @dd($talent) --}}
@section('content')
    <div class="container mt-4">

        <h3 class="mb-4">Client Details</h3>

        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Client ID:</div>
                    <div class="col-md-8">{{ $client->id }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Client Name:</div>
                    <div class="col-md-8">{{ $client->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Contact:</div>
                    <div class="col-md-8">{{ $client->phone }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Email:</div>
                    <div class="col-md-8">{{ $client->email }}</div>
                </div>



                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Status:</div>
                    <div class="col-md-8">{{ ucfirst($client->status) }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Date:</div>
                    <div class="col-md-8">{{ $client->date }}</div>
                </div>

                <a href="{{ url('/clients') }}" class="btn btn-secondary">
                    Back to Clients
                </a>

            </div>
        </div>

    </div>
@endsection
