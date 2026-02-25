@extends('layouts.app')

@section('content')
  @include('partials.marque.list-herozone', ['title' => $title, 'text' => $text, 'surtitle'=> $surtitle ])
  @include('partials.heritage.timeline', ['blocs' => $blocs_heritage, 'background' => $background])
 
@endsection
