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
@push('css')
    <style type="text/css">
        .file-upload {
            display: inline-block;
            cursor: pointer;
        }

        .file-upload label {
            background-color: #007bff;
            /* Button color */
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .file-upload label i {
            font-size: 20px;
        }

        /* Hide the actual file input */
        .file-upload input[type="file"] {
            display: none;
        }
    </style>
@endpush
