@extends('layouts.front.redirex.index')

@section('website-title', 'Redirex Store')

@if($page_content)

    @section('page-title', $page_content->title)

    @section('page-content')
        {!! $page_content->content !!}
    @endsection

@endif