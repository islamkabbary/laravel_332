@extends('layouts.app_layout')

@section('title', 'Shop')

@push('style')
    <style>
        /* Specific Styles for Shop Page Filters */
        .filter-title {
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: #111;
        }

        .filter-link {
            display: block;
            color: #111;
            font-size: 0.9rem;
            margin-bottom: 3px;
            text-decoration: none;
        }

        .filter-link:hover {
            color: #c7511f;
            /* Amazon Orange Hover */
            text-decoration: underline;
        }

        .price-input {
            width: 70px;
            padding: 5px;
            font-size: 0.85rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .pagination .page-link {
            color: #333;
            border-color: #ddd;
        }

        .pagination .page-item.active .page-link {
            background-color: #fff;
            color: #000;
            border-color: #e77600;
            /* Amazon Selected Border */
            border-width: 2px;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    @include()
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 80px; max-width: 1400px;">
        <div class="row">

            <div class="col-lg-2 col-md-3 border-end">
                @php
                    $products = [
                        ['title' => 'product 1', 'old_price' => 1200.0, 'new_price' => 9991.11],
                        ['title' => 'product 2', 'old_price' => 1200.0, 'new_price' => 9992.22],
                        ['title' => 'product 3', 'old_price' => 1200.0, 'new_price' => 9993.33],
                        ['title' => 'product 4', 'old_price' => 1200.0, 'new_price' => 9994.44],
                        ['title' => 'product 5', 'old_price' => 1200.0, 'new_price' => 9995.55],
                        ['title' => 'product 6', 'old_price' => 1200.0, 'new_price' => 9996.66],
                    ];
                @endphp
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <x-product-card-component title="{{ $product['title'] }}" old_price="{{ $product['old_price'] }}"
                            new_price="{{ $product['new_price'] }}">
                        </x-product-card-component>
                    </div>
                @endforeach
            </div>

            <nav class="my-5 d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
    </div>
    </div>

@endsection
