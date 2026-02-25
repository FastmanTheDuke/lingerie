@if($data)
  <section class="swiper relative h-[90vh] pb-1" data-herozone-slider>
    <div class="inline-flex items-center gap-8 w-auto absolute bottom-24 right-[80px] z-10 max-md:right-[40px] max-md:bottom-12 max-sm:right-[20px]">
        <div class="swiper-pagination relative inline-flex w-auto translate-y-2"></div>
        <div class="flex gap-6 max-sm:gap-2">
            <div class="swiper-button-prev arrow-left w-6 relative invert left-0 right-0 mt-0 after:hidden max-sm:w-4" data-cursor-type="arrow-left" data-cursor-text="" data-cursor-rotate="0"></div>
            <div class="swiper-button-next arrow-right w-6 relative invert left-0 right-0 mt-0 after:hidden max-sm:w-4" data-cursor-type="arrow-right" data-cursor-text="" data-cursor-rotate="0"></div>
        </div>
    </div>
    <div class="swiper-wrapper">
      @foreach($data as $i => $card)
        @php
          $visual = get_field('visual_herozone', $card['card']->ID);
          $alt = $visual['alt'] ?? '';
          $src = $visual['sizes']['large'] ?? '';

          $video_field = get_field('video_herozone', $card['card']->ID);
          $video_herozone = $video_field['url'] ?? '';

           

          $url = $card['card']->guid ?? ''; 
          $postTypeObj = get_post_type($card['card']->ID);
          $postType = get_post_type_object($postTypeObj)->name;


          switch ($postType) {
            case 'page':
              $title = get_the_title($card['card']->ID);    
              $titleLarge = get_field('title_large', $card['card']->ID);
            break;
            default:
              $title = $postType;   
              $titleLarge = get_the_title($card['card']->ID);    
          }
          
         
          $url = get_permalink($card['card']->ID);
        @endphp

        <div class="swiper-slide relative overflow-hidden !opacity-100" style="z-index:{{100 + $i+1*10}};">
          <div class="slide-inner h-full w-full">
            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end gap-9 w-full h-full pb-28 pl-20 pr-60 max-md:pl-10 max-md:pb-14 max-md:pr-50 max-sm:pl-5 max-sm:pr-5 max-sm:gap-6">
              <div class="overflow-hidden">
                @php
                  $titleSlug = strtolower('herozone-' . $title);
                  $titleSlug = iconv('UTF-8', 'ASCII//TRANSLIT', $titleSlug);
                @endphp
                <p class="title-type3 text-white" data-slide-text-anim=''>{{ pll_e($titleSlug) }}</p>
              </div>
              <div class="overflow-hidden">
                <h2 class="title-type1 text-white w-2/3 max-xl:w-full" data-slide-text-anim=''>{!!$titleLarge!!}</h2>
              </div>
              <a href="{{ $url }}" class="btn-text text-white shrink-0" data-cursor-type="link-text">{{pll_e('En savoir plus')}}</a>
            </div>
            
            <x-picture-fallback src="{{ $src }}" alt="{{ $alt}}" class="w-full h-full object-cover"/>
            @if($video_herozone)
                <video src="{{ $video_herozone }}" class="w-full h-full object-cover block z-0 absolute top-0" autoplay loop muted playsinline></video>
            @endif
          </div>
        </div>
      @endforeach
    </div>
    <div class="w-full h-1 bg-black relative overflow-hidden">
      <div class="absolute top-0 left-0 h-full w-full bg-white origin-left scale-x-0" data-slide-timer></div>
    </div>
</section>
@endif