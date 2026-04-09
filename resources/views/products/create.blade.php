@extends('layout.master')
@section('title', 'Thêm sản phẩm')
@section('page-title', 'Thêm sản phẩm mới')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle text-success"></i>
                <strong>Thông tin sản phẩm</strong>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Tên sản phẩm <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Nhập tên sản phẩm...">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Giá (đ) <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}" min="0" placeholder="0">
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Số lượng <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity') }}" min="0" placeholder="0">
                            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Danh mục <span class="text-danger">*</span>
                        </label>
                        <select name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ảnh sản phẩm</label>
                        <input type="file" name="image" accept="image/*"
                            class="form-control @error('image') is-invalid @enderror"
                            onchange="previewImg(event)">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <img id="preview" class="mt-2 rounded" style="max-height:160px; display:none;">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3"
                            placeholder="Mô tả sản phẩm...">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-lg me-1"></i>Lưu sản phẩm
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImg(e) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(e.target.files[0]);
    img.style.display = 'block';
}
</script>
@endpush