@props([
  'visual' => null,
  'titre' => null,
  'tag' => null,
  'url' => null,
  'date' => null,
  'is_private' => null,
  'has_access' => null,
])

<div class="relative ajax-card group private_{{ $is_private }} has_access_{{ $has_access }} {{ $is_private==='oui' && !$has_access ? 'js-private-post' : '' }}" data-cursor-type="mode" data-cursor-text="{{pll_e('lire')}}" data-cursor-rotate="25">
  @if($url && ($is_private!=='oui' || $has_access))
      <a href="{{ $url }}" class="!no-underline">
    @else
      <div class="cursor-pointer js-open-auth-popup">
  @endif
  @if($visual)
    <div class="w-full overflow-hidden bg-[#F4F2EF]">
      <div class="origin-center transition-[scale] ease-in-out duration-400 group-hover:!scale-80">
         
        <x-picture-fallback src="{{$visual}}" class="w-full bg-cover bg-center z-0 card-picture" />
      </div>
    </div>
      
  @endif
  <div class="py-6 flex flex-col gap-6 max-sm:gap-4">

      @if($tag)
          <div class="content-type3 text-dark flex gap-2 items-center">
            <div class="w-2 h-2 bg-black rounded-full"></div>
            @if($is_private!=='oui' && !$has_access)
                <div class="restricted-content">
                    <p>Ce contenu est privé. Veuillez vous connecter via le lien envoyé par email.</p>
                    {{-- Afficher ici un résumé ou le flou --}}
                </div>
            @else
               
            @endif
            <p>{{ $tag }}</p>
          </div>
      @endif
      @if($titre)
          <h3 class="title-type4 text-dark underline-none group-hover:underline decoration-[1.5px] underline-offset-3 max-sm:!text-[24px]">{!! $titre !!}</h3>
      @endif
      
      @if($date)
          <p class="content-type2 text-lightGrey">{{ $date }}</p>
      @endif
  </div>
  @if($url && ($is_private!=='oui' || $has_access))
    </a>
  @else
    </div>
  @endif
</div>



