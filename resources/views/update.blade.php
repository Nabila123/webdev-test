@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <span class="fas fa-check-circle text-success fs-3 me-3"></span>
                <p class="mb-0 flex-1">
                    <strong> Berhasil! :</strong> {{ session()->get('success') }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
                <p class="mb-0 flex-1">
                    <strong> Error! :</strong> {{ session()->get('error') }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('updateSave', [$product->id]) }}" method="post">
            <input type="hidden" name="id" value="{{ $product->id }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}"
                            placeholder="Title Product">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Category</label>
                        <select class="form-select" name="category" aria-label="Default select example">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>
                            <option>----------------------------</option>
                            <option value="smartphones">Smartphones</option>
                            <option value="laptops">Laptops</option>
                            <option value="fragrances">Fragrances</option>
                            <option value="skincare">Skincare</option>
                            <option value="groceries">Groceries</option>
                            <option value="home-decoration">Home Decoration</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{ $product->brand }}"
                            placeholder="Brand Product">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price Product"
                            value="{{ $product->price }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="discountPercentage" class="form-label">Discount</label>
                        <input type="number" class="form-control" name="discountPercentage"
                            value="{{ $product->discountPercentage }}" placeholder="Discount Product">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}"
                            placeholder="Stock Product">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-md" value="Update">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('page_scripts')
@endpush
