@if($posts)

    @foreach($posts as $post)
        <x-card-mode visual="{{$post['visual']}}" titre="{!!$post['title']!!}" tag="{{$post['tag']}}"
            url="{{$post['permalink']}}" date="{{$post['date']}}" is_private="{{$post['is_private']}}"
            has_access="{{$post['has_access']}}" />
    @endforeach

@else
    <p>Aucun résultat trouvé.</p>
@endif