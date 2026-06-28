@extends('layouts.app_layout')

@section('title', 'home')

@section('content')
    <div class="container-fluid p-0 mb-4" style="margin-top: 60px;">
        <div class="bg-dark text-white text-center py-5" style="background: linear-gradient(to bottom, #232f3e, #eaeded);">
            <h2 class="display-5 fw-bold">Big Summer Sale</h2>
            <p>Up to 50% off on Electronics & Fashion</p>
        </div>
    </div>

    <div class="container mb-5" style="margin-top: -50px;">
        <div class="row g-4">
            @foreach ($products as $product)
            {{-- @dd($product) --}}
                <div class="col-md-3 col-sm-6">
                    <x-product-card-component :product="$product" />
                    {{-- <x-product-card-component>
                        <x-slot name="title">{{ $product['name'] }}</x-slot>
                        <x-slot name="old_price">{{ $product['price'] }}</x-slot>
                        <x-slot name="new_price">{{ $product['price'] }}</x-slot>
                        <x-slot name="created_by">{{ $product }}</x-slot>
                    </x-product-card-component> --}}
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>

@endsection
