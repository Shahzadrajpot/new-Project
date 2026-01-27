@extends('app')

@section('title', 'Homepage')
{{-- @dd($feeds) --}}
@section('content')
    <h1 class="clients-title">Feed</h1>

    <!-- Search and Filter -->
    <form method="GET" action= ""
        class="control-section d-flex flex-column flex-md-row gap-3 mb-4">

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

    <!-- Table -->
    <div class="table-container">
        <table class="table table-striped clients-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Talent</th>
                    <th>Type</th>
                    <th>Jobs</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feeds as $feed)
                    {{-- @dd($feed) --}}
                    <tr>
                        {{-- <td>{{ $feed->id }}</td> --}}
                        <td>{{ $feed->name }}</td>
                        <td>{{ $feed->talant }}</td>
                        <td>{{ $feed->type }}</td>
                        <td>{{ $feed->jobs }}</td>
                        <td>{{ $feed->date }}</td>

                        <td class="action-button">
                            <form action="{{ route('feed.destroy', $feed->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this feed?');">
                                @csrf
                                @method('DELETE')

                                <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                            <a href="{{ route('feed.view', $feed->id) }}" title="View"><i
                                    class="fas fa-eye text-primary"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $feeds->links() }}
    </div>
@endsection
