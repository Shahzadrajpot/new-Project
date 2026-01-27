@extends('app')

@section('title', 'Homepage')
{{-- @dd($talent) --}}
@section('content')
    {{-- alert for delete action --}}
    {{-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
 @endif --}}




    <h1 class="clients-title d-inline">Clients</h1>

    <!-- Add Button -->
    {{-- <a href="" class="btn btn-primary mb-3 float-end">
             <i class="fas fa-plus"></i> Add New Client
         </a> --}}

    <form method="GET" action= "" class="control-section d-flex flex-column flex-md-row gap-3 mb-4">

        <!-- Search -->
        <div class="search-box flex-grow-1 position-relative">
            <i class="fas fa-search search-icon position-absolute top-50 translate-middle-y ms-3"></i>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control search-input ps-5"
                placeholder="Search clients">
        </div>

        <!-- Filters -->
        <div class="filter d-flex gap-2">

            <!-- Status Filter -->
            <select name="status" class="form-select filter-select">
                <option value="">All</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>Blocked</option>
            </select>

            <!-- Sort by Date -->
            <select name="date" class="form-select filter-select">
                <option value="">Date</option>
                <option value="asc" {{ request('date') == 'asc' ? 'selected' : '' }}>Asc</option>
                <option value="desc" {{ request('date') == 'desc' ? 'selected' : '' }}>Desc</option>
            </select>

            <!-- Submit Button -->
            <button class="btn btn-primary">Apply</button>
        </div>
    </form>
     {{--  Add New Clients Button --}}
    <div class="mb-3 text-center">
        <a href="{{ route('client.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Client
        </a>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="table table-striped clients-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        {{-- <td>{{ $client->id }}</td> --}}
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->status }}</td>
                        <td>{{ $client->date }}</td>

                        <td class="action-button">
                            <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this client?');">
                                @csrf
                                @method('DELETE')

                                <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                            </form>

                            <a href="{{ route('client.view', $client->id) }}" title="View"><i
                                    class="fas fa-eye text-primary"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $clients->links() }}
    </div>
@endsection
