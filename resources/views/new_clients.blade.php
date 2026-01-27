@extends('app')

@section('title', 'Add Talent')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add New Client</h2>

        <form action="{{ route('client.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Client Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="blocked">Blocked</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save Client
            </button>

            <a href="{{ url('/clients') }}" class="btn btn-secondary">
                Cancel
            </a>
        </form>
    </div>
@endsection
