@extends('layouts.master')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat cards --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg,#1e3a5f,#2563eb); color:#fff;">
            <div class="stat-number">{{ $totalProducts }}</div>
            <div class="stat-label"><i class="bi bi-box me-1"></i>Tổng sản phẩm</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg,#065f46,#10b981); color:#fff;">
            <div class="stat-number">{{ $totalCategories }}</div>
            <div class="stat-label"><i class="bi bi-tags me-1"></i>Tổng danh mục</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg,#92400e,#f59e0b); color:#fff;">
            <div class="stat-number">{{ $latestProducts->count() }}</div>
            <div class="stat-label"><i class="bi bi-clock-history me-1"></i>Sản phẩm mới nhất</div>
        </div>
    </div>
</div>

{{-- 5 sản phẩm mới nhất --}}
<div class="card">
    <div class="card-header d-flex align-items-center gap-2">
        <i class="bi bi-clock-history text-primary"></i>
        <strong>5 Sản phẩm mới nhất</strong>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="ps-4" style="width:70px">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestProducts as $product)
                <tr>
                    <td class="ps-4">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" class="product-thumb" alt="">
                        @else
                            <div class="no-img"><i class="bi bi-image"></i></div>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $product->name }}</td>
                    <td class="text-success fw-bold">{{ number_format($product->price,0,',','.') }} đ</td>
                    <td>{{ $product->quantity }}</td>
                    <td><span class="badge-cat">{{ $product->category->name }}</span></td>
                    <td class="text-muted small">{{ $product->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Chưa có sản phẩm nào</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
