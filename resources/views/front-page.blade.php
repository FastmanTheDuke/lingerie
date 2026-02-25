@extends('layouts.app')

@section('content')
  @include('partials.slider-herozone', ['data' => get_field('cards')])
  @include('partials.content-blocks')
@endsection
