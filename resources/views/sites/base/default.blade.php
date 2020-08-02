@extends('base.index')

@section('styles')
    @include('sites.base.layouts.assets.styles')
@endsection

@section('app')
    <div class="site-loader"></div>
    <div class="site-wrap">
        @include('sites.base.layouts.partials._header')
        @yield('site')
    </div>
@endsection

@section('scripts')
    @include('sites.base.layouts.assets.scripts')
@endsection
