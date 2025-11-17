@extends('layouts.app')
@section('title', 'Product Details')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    @if($product->image)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-fluid rounded shadow"
                            style="max-height: 300px;">
                    </div>
                    @endif

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Product ID:</th>
                                <td>{{ $product->product_id }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $product->description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>${{ number_format($product->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Stock:</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Products
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Edit Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection