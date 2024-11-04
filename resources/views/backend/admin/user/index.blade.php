@extends('layouts.app')
@section('title', 'User')
@section('content_header_title', 'User Management')
@section('content_header_subtitle', 'Users')

@section('content_body')
    {{-- Toast --}}
    @include('components.toast.toast')
    {{-- Toast --}}
    {{-- Header --}}
    @include('components.table.header')
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
