@extends('layouts.app')
@section('title', 'Category')
@section('content_header_title', 'Category Management')
@section('content_header_subtitle', 'Category')
@section('content_body')
    {{-- Toast --}}
    @include('components.toast.toast')
    {{-- Toast --}}
    {{-- Header --}}
    <header class="m-2">
        <div class="d-flex flex-row-reverse">
            <button data-bs-toggle="modal" data-bs-target="#categoryCreate" class="btn btn-primary px-4 py-2"
                type="button">
                Create
            </button>
        </div>
    </header>
    @include('backend.admin.category.create')
    {{-- Header --}}
    {{-- Search --}}
    <label for="exampleDataList" class="form-label px-2">Search by anything</label>
    <div class="d-flex justify-content-start p-2">
        <input data-url="{{ route('categories.index') }}" value="{{ request('search') }}" class="search form-control col col-6"
            id="exampleDataList" placeholder="Type to search...">
        @include('components.dropdown.status', [
            'user_status' => $status,
        ])
    </div>
    {{-- Search --}}
    @include('components.table.category_table')
@endsection
@push('js')
    <script src="{{ asset('js/category/custom.js') }}"></script>
@endpush
