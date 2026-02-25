@if($data)

    <section class="flex gutter-L gutter-TB bg-sand max-md:flex-col max-md:gap-12">
        <div class="w-[27%] flex flex-col justify-center items-start gap-7 pr-5 
                    max-md:w-full">
            <h2 class="title-type2 text-dark 
                       max-sm:!text-[40px]">{{ $data['title'] }}</h2>
            <p class="content-type1 text-grey">{{ $data['text'] }}</p>
            @if($data['link'])
                <a href="{{ $data['link']['url'] }}" class="btn-text text-dark">{{ $data['link']['title'] }}</a>
            @endif
        </div>
        <div class="w-[73%] overflow-x-clip px-[17%] pr-[37%] relative pt-[7%] 
                    max-lg:pr-[26%] max-lg:px-[20%] 
                    max-md:px-[13.5%] max-md:w-full max-md:pr-[40%] max-md:pt-[18%]">  
            @if($data['cards'])
                <div class="flex justify-between items-center absolute pr-[80px] right-0 top-0 
                            w-[calc((73vw-80px)*0.47)] 
                            max-lg:w-[calc((73vw-40px)*0.30)] max-lg:pr-[40px] 
                            max-md:w-[calc((73vw-40px)*0.49)]
                            max-sm:w-[calc((73vw-40px)*0.53)] max-sm:pr-[20px] ">
                    <div class="swiper-pagination relative inline-flex translate-y-2"></div>
                    <div class="flex gap-9 
                                max-lg:gap-6
                                max-sm:gap-2">
                        <div class="swiper-button-prev arrow-left w-6 relative left-0 right-0 mt-0 after:hidden max-sm:w-4" data-cursor-type="arrow-left" data-cursor-text="" data-cursor-rotate="0"></div>
                        <div class="swiper-button-next arrow-right w-6 relative left-0 right-0 mt-0 after:hidden max-sm:w-4" data-cursor-type="arrow-right" data-cursor-text="" data-cursor-rotate="0"></div>
                    </div>
                </div>
                <div class="swiper overflow-visible" data-brands-slider>
                    <div class="swiper-wrapper !overflow-visible" style='transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);'>
                        @php
                            shuffle($data['cards'])
                        @endphp
                    
                        @foreach($data['cards'] as $card)
                            @php
                                $visual = get_field('visual_9-16', $card['brand']->ID);
                                $alt = $visual['alt'] ?? '';
                                $src = $visual['sizes']['large'] ?? '';

                                $visualLogo = get_field('visual_logo', $card['brand']->ID);
                                $altLogo = $visualLogo['alt'] ?? '';
                                $srcLogo = $visualLogo['sizes']['medium'] ?? '';

                                $permalink = get_permalink($card['brand']->ID);
                            @endphp
                            <div class="swiper-slide origin-bottom-right">
                                <a class="relative block" href="{{ $permalink }}">
                                    <x-picture-fallback src="{{ $src }}" alt="{{ $alt }}" />
                                    <img class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 invert-100 max-w-4/5 h-16 object-contain z-10" src="{{ $srcLogo }}" alt="{{ $altLogo }}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endif
