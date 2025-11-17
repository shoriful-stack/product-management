@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">All Products</h3>
        <a href="{{ route('products.create') }}" class="btn btn-primary shadow-sm">
            Add Product
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->product_id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>${{ number_format($p->price, 2) }}</td>

                        <td>
                            <img src="{{ asset('storage/' . $p->image) }}"
                                width="60"
                                class="rounded shadow-sm"
                                alt="Product Image">
                        </td>

                        <td>

                            <a href="{{ route('products.show', $p->id) }}"
                                class="btn btn-info btn-sm text-white">
                                View
                            </a>

                            <a href="{{ route('products.edit', $p->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $p->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</div>

@endsection