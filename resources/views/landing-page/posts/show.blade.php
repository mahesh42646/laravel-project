@extends('layouts.landing-page.master')
@section('title') {{ $post->title }} - {{ config('app.name') }} @endsection

@section('content')
  <div class="page_wrapper">
      <div class="container">
        <h2 class="font-weight-bold my-3">{{ $post->title }}</h2>
        <div>{!! $post->content !!}</div>
      </div>
  </div>
@endsection
