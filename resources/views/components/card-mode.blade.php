@props([
  'visual' => null,
  'titre' => null,
  'tag' => null,
  'url' => null,
  'date' => null,
])

<div class="relative ajax-card group" data-cursor-type="mode" data-cursor-text="{{pll_e('lire')}}" data-cursor-rotate="25">
  @if($url)
    <a href="{{ $url }}" class="!no-underline">
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
  @if($url)
    </a>
  @endif
</div>



