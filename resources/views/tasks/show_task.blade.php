@extends('app')


@section('title', 'Task Details')
{{-- @section('title', 'Homepage') --}}
{{-- @dd($talent) --}}
@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Task Details</h3>

    <div class="card">
        <div class="card-body">

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Task ID:</div>
                <div class="col-md-8">{{ $task->id }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Skill:</div>
                <div class="col-md-8">{{ $task->skill }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Client Name:</div>
                <div class="col-md-8">{{ $task->client_name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Talent Name:</div>
                <div class="col-md-8">{{ $task->talent_name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Status:</div>
                <div class="col-md-8">{{ ucfirst($task->status) }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Date:</div>
                <div class="col-md-8">{{ $task->date }}</div>
            </div>

            <a href="{{ url('/tasks') }}" class="btn btn-secondary">
                Back to Tasks
            </a>

        </div>
    </div>

</div>
@endsection

