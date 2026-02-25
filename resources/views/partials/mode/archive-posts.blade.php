{{-- Dans resources/views/partials/mode/archive-posts.blade.php --}}
@if($posts && isset($posts['list']))
    @foreach($posts['list'] as $post) {{-- Ajoutez ['list'] ici --}}
        <x-card-mode visual="{{$post['visual']}}" titre="{!!$post['title']!!}" tag="{{$post['tag']}}"
            url="{{$post['permalink']}}" date="{{$post['date']}}" is_private="{{$post['is_private']}}" {{-- Sera enfin rempli
            --}} has_access="{{$post['has_access']}}" />
    @endforeach
@endif