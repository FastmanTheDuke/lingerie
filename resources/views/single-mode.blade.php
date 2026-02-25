@extends('layouts.app')

@section('content')

    @include('partials.default.herozone', ['title' => $title, 'surtitle' => $parentPostType, 'visual_herozone' => $visual_herozone, 'tags' => $tags, 'date' => $date])
    @include('partials.content-blocks-fiche')
@endsection