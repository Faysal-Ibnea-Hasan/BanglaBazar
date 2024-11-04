@extends('layouts.app')
@section('title', 'Category')
@section('content_header_title', 'Category Management')
@section('content_header_subtitle', 'Category')
@section('content_body')
    {{-- Toast --}}

    {{-- Toast --}}
    {{-- Header --}}
    @include('components.table.header')
    {{-- Header --}}
    {{-- Modal --}}


    {{-- Modal --}}
    @include('components.table.category_table')
@endsection
@push('js')

@endpush