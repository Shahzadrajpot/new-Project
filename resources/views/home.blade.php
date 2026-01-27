@extends('app')

@section('title', 'Homepage')

@section('content')
    <h1 class="clients-title">Clients</h1>

    <!-- Search and Filter -->
    <div class="control-section d-flex flex-column flex-md-row gap-3 mb-4">
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
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="table table-striped clients-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>8904-client</td>
                    <td>8904-client</td>
                    <td>8904-client@gmail.com</td>
                    <td><span class="status-badge approved">approved</span></td>
                    <td>N/A</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>client2</td>
                    <td>12345672212-client</td>
                    <td>client2@gmail.com</td>
                    <td><span class="status-badge rejected">rejected</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Restore"><i class="fas fa-undo text-warning"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Rqvuw</td>
                    <td>1264556-client</td>
                    <td>Rqvuw@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Restore"><i class="fas fa-undo text-warning"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>client72</td>
                    <td>12367645672212-clien</td>
                    <td>client72@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Restore"><i class="fas fa-undo text-warning"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>client772</td>
                    <td>12772212-client</td>
                    <td>client772@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>client21</td>
                    <td>123456722121-client</td>
                    <td>client21@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Restore"><i class="fas fa-undo text-warning"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Rabia1</td>
                    <td>031246494-client</td>
                    <td>Rabia1@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Rabias</td>
                    <td>03124649464-client</td>
                    <td>Rabias@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Hsbs</td>
                    <td>9797997-client</td>
                    <td>Hsbs@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Gehs</td>
                    <td>6464-client</td>
                    <td>Gehs@gmail.com</td>
                    <td><span class="status-badge pending">pending</span></td>
                    <td>2025-07-30</td>
                    <td class="action-button">
                        <button title="Delete"><i class="fas fa-trash text-danger"></i></button>
                        <button title="View"><i class="fas fa-eye text-primary"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        <button class="pagination-btn prev-btn" disabled>&lt;</button>
        <div class="pagination-numbers d-flex gap-1">
            <button class="pagination-number active">1</button>
            <button class="pagination-number">2</button>
            <button class="pagination-number">3</button>
            <button class="pagination-number">4</button>
            <button class="pagination-number">5</button>
            <button class="pagination-number">6</button>
            <button class="pagination-number">7</button>
            <button class="pagination-number">8</button>
            <button class="pagination-number">9</button>
        </div>
        <button class="pagination-btn next-btn">&gt;</button>
    </div>
@endsection
