@extends('layouts.app_layout')

@section('title', 'All products')

@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="mt-5 d-flex justify-content-between">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                {{-- @can('create') --}}
                <div>
                    <a href="{{ route('products.create') }}">
                        <button class="btn btn-amazon">Add Product</button>
                    </a>
                </div>
                {{-- @endcan --}}
            </div>
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">created by</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->createdBy->name }}</td>
                            <td>
                                @can('delete')
                                    <a href="{{ route('products.create') }}">
                                        <button class="btn btn-amazon">Add Product</button>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
