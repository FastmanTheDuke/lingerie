@if($cards)
  <section class="gutter-LR gutter-m-TB">
    <div class="swiper !overflow-visible" data-pushed-card-list-slider>
      <div class="swiper-wrapper !overflow-visible" style='transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);'>
        @foreach($cards as $i => $card)
          @if($i > 2) 
            @break
          @endif
          <div class="swiper-slide w-full !opacity-100" style="z-index:{{100 - $i+1*10}};">
            <a href="{{$card['permalink']}}" class="slide-inner flex group w-full flex-1 !no-underline max-md:flex-col" data-cursor-type="pushed-card" data-cursor-text="{{pll_e('lire')}}" data-cursor-rotate="25">   
              <div class="w-[60%] bg-[#F4F2EF] max-md:w-full">
                <x-picture-fallback class="aspect-[760/560] object-cover origin-center transition-[scale] ease-in-out duration-400 group-hover:!scale-80 md:h-full max-md:aspect-[500/560]" src="{{$card['visual']}}" alt="{{ $card['title'] }}"/>
              </div>
              <div class="w-[40%] flex flex-col gap-8 p-10 bg-[#F4F2EF] max-md:w-full max-md:gap-4 max-sm:px-6">
                <div class="title-type3 text-grey mb-auto">{{pll_e('focus')}}</div>  

                @if($card['tag'])
                  <div class="content-type3 text-dark flex gap-2 items-center mt-6">
                    <div class="w-2 h-2 bg-black rounded-full"></div>
                    <p>{{ $card['tag'] }}</p>
                  </div>
                @endif
                @if($card['title'])
                  <h3 class="title-type7 group-hover:underline decoration-[1.5px] underline-offset-3">{!!$card['title']!!}</h3>
                @endif
                <p class="btn-text mt-2" >{{pll_e('lire')}}</p>
                
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <div class="swiper-button-prev absolute w-8 h-8 box-content p-3 left-0 right-0 mt-0 -translate-y-1/2 -translate-x-1/2 bg-black rounded-full after:hidden pointer-events-auto max-sm:left-4 max-sm:w-4 max-sm:h-4" data-cursor-type="arrow-left">
        <div class="arrow-left w-6 h-6 invert-100"></div>
      </div>
      <div class="swiper-button-next absolute w-8 h-8 box-content p-3 right-0 mt-0 -translate-y-1/2 translate-x-1/2 bg-black rounded-full after:hidden pointer-events-auto max-sm:right-4 max-sm:w-4 max-sm:h-4" data-cursor-type="arrow-right">
        <div class="arrow-right w-6 h-6 invert-100"></div>
      </div>
    </div>
  </section>
@endif
