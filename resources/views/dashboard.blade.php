@extends('layout.master')

@section('content')

<h2>Dashboard</h2>

<p>Tổng sản phẩm: {{ $totalProducts }}</p>
<p>Tổng danh mục: {{ $totalCategories }}</p>

<div class="mb-3">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm Danh Mục</a>
    <a href="{{ route('products.create') }}" class="btn btn-success">Thêm Sản Phẩm</a>
</div>

<h3>5 sản phẩm mới nhất</h3>

<table border="1">
<tr>
    <th>Tên</th>
    <th>Giá</th>
</tr>

@foreach($latestProducts as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
</tr>
@endforeach

</table>

<h3>Danh Sách Danh Mục</h3>

<table border="1">
<tr>
    <th>Tên Danh Mục</th>
    <th>Mô Tả</th>
</tr>

@foreach($categories as $category)
<tr>
    <td>{{ $category->name }}</td>
    <td>{{ $category->description }}</td>
</tr>
@endforeach

</table>

@endsection