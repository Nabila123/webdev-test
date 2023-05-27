@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="{{ $product->thumbnail }}"
                                        width="250" /> </div>
                                <div class="thumbnail text-center">
                                    @for ($i = 0; $i < count($product->images); $i++)
                                        <img onclick="change_image(this)" src="{{ $product->images[$i] }}" width="70">
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('home') }}">
                                            <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3"> <span
                                        class="text-uppercase text-muted brand">{{ $product->brand }}</span>
                                    <h5 class="text-uppercase">{{ $product->title }}</h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price">${{ $product->price }}</span>
                                    </div>
                                </div>
                                <p class="about">{{ $product->description }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }
    </script>
@endpush
