@extends('layouts.app')

@section('content')
  @include('partials.default.list-herozone', ['title' => $title, 'text' => $text, 'surtitle'=> $surtitle ])
  @include('partials.default.list-pushed-cards', ['cards' => $pushedCards])

  <x-archive-filters maxPage="{{$posts['maxPage']}}" :tags="$tags" title="{{pll__('Toutes nos actualités')}}" />

  <div id="ajax-posts-container" class="grid grid-cols-4 gap-6 gutter-LR pt-16 max-lg:grid-cols-3 max-md:grid-cols-2 max-sm:grid-cols-1">
    @include('partials.actualite.archive-posts', ['posts' => $posts['list']])
  </div>

  <div class="w-full flex justify-center pb-24">
    <x-archive-load_more maxPage="{{$posts['maxPage']}}">{{pll__('Charger plus de publications')}}</x-archive-load_more>
  </div>
@endsection
