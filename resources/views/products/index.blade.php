@extends('layout.master')
@section('title', 'Danh sách sản phẩm')
@section('page-title', 'Danh sách sản phẩm')

@section('content')

{{-- Bộ lọc --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('products.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label text-muted small mb-1">Tìm kiếm</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control"
                        placeholder="Nhập tên sản phẩm..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label text-muted small mb-1">Sắp xếp theo giá</label>
                <select name="sort" class="form-select">
                    <option value="">-- Mặc định --</option>
                    <option value="price_asc"  {{ request('sort')=='price_asc'  ? 'selected':'' }}>Tăng dần ↑</option>
                    <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected':'' }}>Giảm dần ↓</option>
                </select>
            </div>
            <div class="col-auto d-flex gap-2">
                <button class="btn btn-primary"><i class="bi bi-funnel me-1"></i>Lọc</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="col text-end">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg me-1"></i>Thêm sản phẩm
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Bảng sản phẩm --}}
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="ps-4" style="width:50px">#</th>
                    <th style="width:70px">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th class="text-center" style="width:130px">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $i => $product)
                <tr>
                    <td class="ps-4 text-muted small">{{ $products->firstItem() + $i }}</td>
                    <td>
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
                    <td class="text-center">
                        <a href="{{ route('products.edit', $product) }}"
                           class="btn btn-sm btn-outline-warning me-1" title="Sửa">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                              class="d-inline" id="del-{{ $product->id }}">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Xóa"
                                onclick="confirmDelete({{ $product->id }}, '{{ addslashes($product->name) }}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                        Không tìm thấy sản phẩm nào.
                        <a href="{{ route('products.create') }}">Thêm ngay!</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 px-4">
        <span class="text-muted small">
            Hiển thị {{ $products->firstItem() }}–{{ $products->lastItem() }}
            / {{ $products->total() }} sản phẩm
        </span>
        {{ $products->links() }}
    </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    if (confirm('Bạn có chắc muốn xóa sản phẩm "' + name + '"?\nHành động này không thể hoàn tác!')) {
        document.getElementById('del-' + id).submit();
    }
}
</script>
@endpush