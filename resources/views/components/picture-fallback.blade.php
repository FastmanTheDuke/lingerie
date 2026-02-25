@props([
  'class' => '',
  'src' => '',
  'alt' => ''
])

<img class="{{$class}}" src="{{ getPictureFallbackSrc($src) }}" alt="{{$alt}}" data-fallback />
