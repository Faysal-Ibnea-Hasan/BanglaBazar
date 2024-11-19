@extends('layouts.app')
@section('title', 'Sub-Category')
@section('content_header_title', 'Sub-Category Management')
@section('content_header_subtitle', 'Sub-Category')
@section('content_body')
    {{-- Toast --}}
    @include('components.toast.toast')
    {{-- Toast --}}
    {{-- Header --}}
    <header class="m-2">
        <div class="d-flex flex-row-reverse">
            <button data-toggle="modal" data-target="#subCategoryCreate" class="btn btn-primary px-4 py-2" type="button">
                Create
            </button>
        </div>
    </header>
    @include('backend.admin.subCategory.create')
    {{-- Header --}}
    {{-- Search --}}
    <label for="exampleDataList" class="form-label px-2">Search by anything</label>
    <div class="d-flex justify-content-start p-2">
        <input data-url="{{ route('sub_categories.index') }}" value="{{ request('search') }}"
            class="search form-control col col-6" id="exampleDataList" placeholder="Type to search...">
        @include('components.dropdown.status', [
            'user_status' => $status,
        ])
        @include('components.dropdown.category')
    </div>
    {{-- Search --}}
    @include('components.table.sub_category_table')
@endsection
@push('js')
    <script src="{{ asset('js/subCategory/custom.js') }}"></script>
@endpush
