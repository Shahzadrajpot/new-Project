<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talenoo - Clients</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .navbar-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .brand-logo {
            width: 40px;
            height: 40px;
        }

        .menu-link {
            color: #333;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }

        .menu-link:hover {
            background-color: #f8f9fa;
        }

        .bell-icon-container {
            position: relative;
        }

        .brand-dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.375rem;
            z-index: 1000;
        }

        .brand-dropdown:hover .dropdown-content {
            display: block;
        }

        .main-content {
            padding: 2rem;
        }

        .clients-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .search-box {
            position: relative;
            margin-bottom: 1rem;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .search-input {
            padding-left: 2.5rem;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
        }

        .filter-select {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .approved {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .blocked {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .action-button {
            display: flex;
            gap: 0.5rem;
        }

        .action-button button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.2s;
        }

        .action-button button:hover {
            background-color: #f8f9fa;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .pagination-btn {
            padding: 0.5rem 0.75rem;
            border: 1px solid #ced4da;
            background-color: #fff;
            color: #6c757d;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .pagination-btn:hover:not(:disabled) {
            background-color: #e9ecef;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-number {
            padding: 0.5rem 0.75rem;
            border: 1px solid #ced4da;
            background-color: #fff;
            color: #6c757d;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .pagination-number.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination-number:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/talinoo 1.svg" alt="Brand Logo" class="brand-logo">
                </a>
                <div class="d-flex align-items-center">
                    <div class="menu-links d-flex me-4">
                        <a class="menu-link" href="/dashboard">Dashboard</a>
                        <a class="menu-link" href="/clients">Clients</a>
                        <a class="menu-link" href="/talents">Talents</a>
                        <a class="menu-link" href="/feed">Feed</a>
                        <a class="menu-link" href="/tasks">Tasks</a>
                        <a class="menu-link" href="/skill">Skill</a>
                        <a class="menu-link" href="/languages">Languages</a>
                        <a class="menu-link" href="/cities">Cities</a>
                        <a class="menu-link" href="/contact-us">Contact Us</a>
                    </div>
                    <div class="bell-icon-container me-3">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="brand-dropdown">
                        <img src="/technologyIcon.svg" alt="User Icon" class="brand-logo rounded-circle">

                        <div class="dropdown-content">
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-decoration-none text-danger">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </nav>
                         {{-- alert session  --}}
    @include('partials.alerts')


                         {{-- end alert session --}}


    <!-- Main Content -->
    <div class="main-content">
        @yield('content')

    </div> 
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
