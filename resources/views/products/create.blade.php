@extends('layouts.app_layout')

@section('title', 'All products')

@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            <form class="row my-5" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="">price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group mt-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="active" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Active
                        </label>
                    </div>
                </div>
                <div class="form-row mt-5">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
