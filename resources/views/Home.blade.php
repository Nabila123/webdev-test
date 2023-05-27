@extends('layouts.app')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 mb-3">
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center d-flex align-items-center" role="alert">
                    <span class="fas fa-check-circle text-success fs-3 me-3"></span>
                    <p class="mb-0 flex-1">
                        <strong> Berhasil! :</strong> {{ session()->get('success') }}
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center d-flex align-items-center" role="alert">
                    <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
                    <p class="mb-0 flex-1">
                        <strong> Error! :</strong> {{ session()->get('error') }}
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($products as $product)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="{{ $product->thumbnail }}" class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(253, 253, 253, 0.15);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>{{ $product->title }}</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                                @for ($i = 0; $i < (int) $product->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <span>{{ $product->rating }}</span>
                                        </div>

                                        <p class="text-truncate mb-4 mb-md-0">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">${{ $product->price }}</h4>
                                            <span
                                                class="text-danger"><s>${{ (int) $product->discountPercentage }}</s></span>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <a href="{{ route('update', [$product->id]) }}" class="btn btn-primary btn-sm"
                                                type="button">Update</a>
                                            <a href="{{ route('detail', [$product->id]) }}"
                                                class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-lg-7">

                </div>
                <div class="col-lg-4">
                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>

        </div>
    </section>
@endsection
