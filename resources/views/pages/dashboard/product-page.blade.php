@extends('layout.sidenav-layout')


@section('content')

    @include('components.product.product-list')
    @include('components.product.product-create')
    @include('components.product.product-update')
    @include('components.product.product-delete')
@endsection
