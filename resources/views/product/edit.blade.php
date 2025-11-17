@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Edit Product</h3>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Products
        </a>
    </div>

    <div class="card shadow border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Product ID</label>
                        <input type="text" name="product_id" class="form-control" value="{{ $product->product_id }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Product Image</label>
                        <input type="file" id="imageInput" class="form-control">
                        <input type="hidden" name="image" id="imageBase64" value="{{ old('image', $product->image) }}">
                        <div class="mt-2">
                            @if($product->image)
                            <img id="imagePreview" src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail" style="max-height: 120px;">
                            @else
                            <img id="imagePreview" src="" alt="Product Image" class="img-thumbnail" style="display:none; max-height: 120px;">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                        Update Product
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    const imageInput = document.getElementById('imageInput');
    const imageBase64 = document.getElementById('imageBase64');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const base64 = reader.result;
                imageBase64.value = base64;
                imagePreview.src = base64;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection