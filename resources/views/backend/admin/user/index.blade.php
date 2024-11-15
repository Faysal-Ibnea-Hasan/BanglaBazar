@extends('layouts.app')
@section('title', 'User')
@section('content_header_title', 'User Management')
@section('content_header_subtitle', 'Users')

@section('content_body')
    {{-- Toast --}}
    @include('components.toast.toast')
    {{-- Toast --}}
    {{-- Header --}}
    <header class="m-2">
        <div class="d-flex flex-row-reverse">
            <button data-bs-toggle="modal" data-bs-target="#userCreate" class="btn btn-primary px-4 py-2" type="button">
                Create
            </button>
        </div>
    </header>
    {{-- Header --}}
    {{-- Modal --}}
    @include('backend.admin.user.create')
    @include('backend.admin.user.edit')
    @include('backend.admin.user.details')
    {{-- Modal --}}
    @include('components.search.search-box')
    @include('components.table.user_table')
@endsection
@push('js')
    <script src="{{ asset('js/user/status-change.js') }}"></script>
    <script src="{{ asset('js/user/custom.js') }}"></script>
    <script src="{{ asset('js/user/search.js') }}"></script>
@endpush
