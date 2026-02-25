@extends('layouts.app')

@section('content')

    HO
    @include('partials.default.herozone', ['title' => $title, 'surtitle' => $parentPostType, 'visual_herozone' => $visual_herozone, 'tags' => $tags, 'date' => $date])
    @if($is_private === 'oui' && !$has_access)
        <div class="container py-20 text-center">
            <h2 class="font-forum text-3xl mb-4">Contenu Privé</h2>
            <p>Veuillez utiliser le lien d'accès envoyé par email pour consulter cette fiche mode.</p>
            <button class="js-open-auth-popup underline mt-4">Recevoir un lien d'accès</button>
        </div>
    @else
        @include('partials.content-blocks-fiche')
    @endif
@endsection