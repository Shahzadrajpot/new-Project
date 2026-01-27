@extends('app')

@section('title', 'Homepage')
{{-- @dd($talent) --}}
<div class="container">

    @section('content')
        <h1 class="clients-title">Dashboard</h1>


        <!-- Search and Filter -->
        {{-- <div class="control-section d-flex flex-column flex-md-row gap-3 mb-4">
        <div class="search-box flex-grow-1">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="form-control search-input" placeholder="Search clients">
        </div>
        <div class="filter d-flex gap-2">
            <select class="filter-select">
                <option value="All">All</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
                <option value="blocked">Blocked</option>
            </select>
            <select class="filter-select">
                <option value="All">Date</option>
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>
        </div>
    </div> --}}
        <div class="container">
            <div class="row m-5 text-center justify-content-center g-3">
                <div class="col-md-3 m-5 border border-rounded pt-3 shadow" style="background-color:#EFEDF6">
                    <h5><b>Total Talents</b></h5>
                    <p>
                        {{-- @dd($totalTalents) --}}
                        <b>{{ $totalTalents }}</b>
                    </p>
                </div>
                <div class="col-md-3 m-5 border border-rounded pt-3 shadow" style="background-color: #FAEDE6">
                    <h5><b>Total Tasks</b></h5>
                    <p></p>
                    <b>{{ $totalTasks }}</b>
                    </p>
                </div>
                <div class="col-md-3 m-5 border border-rounded pt-3 shadow" style="background-color: #E8EDF5">
                    <h5><b>Total Clients</b></h5>
                    <p>
                        <b>{{ $totalClients }}</b>
                    </p>
                </div>
            </div>
        </div>


        <!-- Table -->
        <div class="table-container">
            <table class="table table-striped clients-table">
                <thead>
                    <h1>Recent Activity</h1>
                    <tr>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dashboards as $dashboard)
                        <tr>
                            {{-- <td>{{ $dashboard->id }}</td> --}}
                            <td>{{ $dashboard->activity }}</td>
                            <td>{{ $dashboard->date }}</td>
                            <td>{{ $dashboard->user }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="pagination-container">
        {{ $dashboards->links() }}
    </div> --}}
    @endsection
</div>
