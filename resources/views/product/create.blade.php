@extends('layouts.app')
@section('title', 'Add Product')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Add New Product</h3>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="card shadow border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Product ID</label>
                        <input type="text" name="product_id" class="form-control" placeholder="e.g. P-1001" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Write product description"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter product price" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Stock</label>
                        <input type="number" name="stock" class="form-control" placeholder="Enter stock quantity" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Product Image</label>
                        <input type="file" id="imageInput" class="form-control">
                        <input type="hidden" name="image" id="imageBase64">
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                        Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    document.getElementById('imageInput').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const base64 = reader.result;
            localStorage.setItem("product_image", base64);
            document.getElementById('imageBase64').value = base64;
        };

        reader.readAsDataURL(file);
    });
</script>
@endsection