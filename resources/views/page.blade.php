@extends('layouts.app')

@section('content')

  @include('partials.default.list-herozone', ['title' => $surtitle, 'text' => $text, 'surtitle'=> '' ])
  @include('partials.default.bloc-texts', ['blocs' => $blocs_texts])
  @include('partials.content-blocks', ['blocs' => $blocs_texts])
@endsection