@if($data)
    <section class="gutter-m-TB">
        <div class="flex gap-5 gutter-L gutter-TB relative bg-[#F4F2EF] overflow-clip max-sm:flex-col max-sm:gap-10">
            <div class="absolute w-3/5 h-full top-0 left-0 bg-center bg-size-cover z-0 max-sm:w-full max-sm:h-1/2" style="background-image: url({{ $data['visual']['sizes']['large'] }});"></div>
            <div class="w-[25%] flex flex-col items-start gap-7 z-10 relative max-sm:w-full">
                @if($data['surtitle'])
                    <p class="title-type3 text-white">{{ $data['surtitle'] }}</p>
                @endif
                @if($data['title'])
                    <h2 class="title-type2 text-white">{{ $data['title'] }}</h2>
                @endif
            </div>
            <div class="w-[75%] overflow-x-clip max-sm:w-full">
                @if($data['products'])
                    <div class="swiper pl-18 overflow-visible relative max-sm:pl-0" data-products-slider>
                        <div class="swiper-wrapper !overflow-visible" style='transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);'>
                            @foreach($data['products'] as $i => $card)
                                @php
                                    $alt = $card['visual']['alt'] ?? '';
                                    $src = $card['visual']['sizes']['large'] ?? '';
                                    $permalink = $card['link']['url'] ?? '';
                                    $title = $card['title'] ?? '';
                                    $subtitle = $card['subtitle'] ?? '';
                                    $brand = $card['brand'] ?? '';
                                @endphp

                                <div class="swiper-slide ease-in-out">
                                    <div class="pr-6 max-sm:pr-4">
                                        <x-card-product src="{{ $src }}" alt="{{ $alt }}" title="{{ $title }}" subtitle="{{ $subtitle }}" permalink="{{ $permalink }}" brand="{{ $brand }}" />
                                    </div>
                                    
                                </div>
                            @endforeach

                            
                            @foreach($data['products'] as $i => $card)
                                @php
                                    $alt = $card['visual']['alt'] ?? '';
                                    $src = $card['visual']['sizes']['large'] ?? '';
                                    $permalink = $card['link']['url'] ?? '';
                                    $title = $card['title'] ?? '';
                                    $subtitle = $card['subtitle'] ?? '';
                                    $brand = $card['brand'] ?? '';
                                @endphp

                                <div class="swiper-slide ease-in-out">
                                    <div class="pr-6 max-sm:pr-4">
                                        <x-card-product src="{{ $src }}" alt="{{ $alt }}" title="{{ $title }}" subtitle="{{ $subtitle }}" permalink="{{ $permalink }}" brand="{{ $brand }}" />
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev absolute w-8 h-8 box-content p-3 left-32 right-0 mt-0 -translate-y-1/2 bg-white rounded-full after:hidden max-md:left-7 max-md:w-4 max-md:h-4" data-cursor-type="arrow-left">
                            <div class="arrow-left w-6 h-6"></div>
                        </div>
                        <div class="swiper-button-next absolute w-8 h-8 box-content p-3 right-14 mt-0 -translate-y-1/2 bg-white rounded-full after:hidden max-md:right-7 max-md:w-4 max-md:h-4" data-cursor-type="arrow-right">
                            <div class="arrow-right w-6 h-6"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>


@endif
