@if($data)

    <section class="gutter-m-TB gutter-LR overflow-clip">
        <div class="w-[450px] flex flex-col justify-center items-start gap-7 max-md:w-full">
            <p class="title-type3 text-grey">{{ $data['surtitle'] }}</p>
            <h2 class="title-type2 text-dark">{{ $data['title'] }}</h2>
        </div>
        <div class="swiper mt-14 !overflow-visible" data-partners-slider>
            <div class="swiper-wrapper">
                @foreach($data['cards'] as $card)
                <div class="swiper-slide bg-sand p-8">
                        <img src="{{ $card['visual_logo']['sizes']['medium']}}" alt="{{ $card['visual_logo']['alt']}}" class="w-2/3 max-w-44 object-contain" />
                    
                        <div class="content-type1 text-grey mt-11">
                            {!! $card['text'] !!}
                        </div>
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