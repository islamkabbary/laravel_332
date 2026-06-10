@extends('layouts.app_layout')

@section('title', 'Shop')

@push('style')
    <style>
        body {
            background: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="auth-container">
        <div class="auth-logo">amaz<span>on</span></div>

        <div class="auth-box">
            <h3 class="fw-normal mb-3">Contact Us</h3>
            <form method="POST" action="{{ route('create_contact') }}">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Name</label>
                    <input type="name" class="form-control" name="name"> 
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small" >message</label>
                    <textarea class="form-label fw-bold"name="message" >

                </textarea>
                </div>
                <button type="submit" class="btn btn-amazon w-100">Send</button>
            </form>
        </div>
    </div>
@endsection
