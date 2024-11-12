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
            <button data-bs-toggle="modal" data-bs-target="#categoryCreate" class="btn btn-primary px-4 py-2" type="button">
                Create
            </button>
        </div>
    </header>
    @include('backend.admin.category.create')
    {{-- Header --}}
    {{-- Modal --}}
    {{-- Modal --}}
    @include('components.table.category_table')
@endsection
@push('js')
<script src="{{asset('js/category/custom.js')}}"></script>
@endpush
