{{--
  Template Name: Sidebar
--}}

@extends('layouts.sidebar')

@section('sidebar')
    @include('sections.sidebar')
@endsection

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('partials.page-header')
        @include('partials.content-page')
    @endwhile
@endsection
