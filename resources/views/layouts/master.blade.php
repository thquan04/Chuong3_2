<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản Lý Sản Phẩm')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --sidebar-bg: #1e3a5f; --sidebar-width: 240px; }
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding: 24px 16px;
            z-index: 100;
        }
        .sidebar .brand {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            padding: 0 8px 24px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            margin-bottom: 16px;
        }
        .sidebar .nav-link {
            color: #93b4d4;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 4px;
            font-size: .93rem;
            transition: all .2s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,.12);
        }

        /* Main */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            padding: 28px 32px;
            min-height: 100vh;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .page-header h4 { font-weight: 700; color: #1e3a5f; margin: 0; }

        /* Card */
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 16px rgba(0,0,0,.07);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            border-radius: 14px 14px 0 0 !important;
            padding: 16px 20px;
        }

        /* Table */
        .table thead th { background: #f8fafc; color: #4b5563; font-weight: 600; font-size: .88rem; }
        .table tbody td { vertical-align: middle; font-size: .92rem; }
        .product-thumb {
            width: 52px; height: 52px;
            object-fit: cover;
            border-radius: 10px;
            background: #f0f4f8;
        }
        .no-img {
            width: 52px; height: 52px;
            border-radius: 10px;
            background: #f0f4f8;
            display: flex; align-items: center; justify-content: center;
            color: #9ca3af;
        }
        .badge-cat {
            background: #e0eaff;
            color: #3b5bdb;
            border-radius: 20px;
            padding: 3px 12px;
            font-size: .78rem;
            font-weight: 600;
        }

        /* Stat cards */
        .stat-card { border-radius: 14px; padding: 24px; border: none; }
        .stat-card .stat-number { font-size: 2.4rem; font-weight: 800; }
        .stat-card .stat-label { font-size: .88rem; opacity: .8; margin-top: 4px; }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="brand"><i class="bi bi-box-seam me-2"></i>ProductMgr</div>
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>
    <a href="{{ route('products.index') }}"
       class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
        <i class="bi bi-grid me-2"></i>Danh sách SP
    </a>
    <a href="{{ route('products.create') }}"
       class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
        <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm
    </a>
</aside>

{{-- MAIN --}}
<div class="main-wrapper">
    <div class="page-header">
        <h4>@yield('page-title', 'Dashboard')</h4>
        <span class="text-muted small">
            <i class="bi bi-calendar3 me-1"></i>{{ now()->format('d/m/Y') }}
        </span>
    </div>

    {{-- Alert component --}}
    <x-alert />

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
