@if($data)

    <section class="flex gap-5 gutter-L gutter-m-TB overflow-clip max-md:flex-col max-md:gap-12">
        <div class="w-[40%] flex flex-col justify-center items-start gap-7 pr-52 max-lg:pr-12 max-md:w-full">
            <h2 class="title-type2 text-dark max-lg:!text-[46px]">{{ $data['title'] }}</h2>
            <p class="content-type1 text-grey">{{ $data['text'] }}</p>
            @if($data['link'])
                <a href="{{ $data['link']['url'] }}" class="btn-text text-dark">{{ $data['link']['title'] }}</a>
            @endif
        </div>
        <div class="w-[60%] overflow-x-clip max-md:w-full">
            @if($data['cards'])
                <div class="">
                    <div class="swiper" data-brands-logo-slider>
                        <div class="swiper-wrapper !overflow-visible" style='transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);'>
                            @foreach($data['cards'] as $card)
                                @php
                                    $visual = get_field('visual_logo', $card['brand']->ID);
                                    $alt = $visual['alt'] ?? '';
                                    $src = $visual['sizes']['large'] ?? '';
                                    $permalink = get_permalink($card['brand']->ID);
                                @endphp
                                <div class="swiper-slide pr-6 h-48 w-50 box-content max-sm:w-32 max-sm:h-34 max-sm:pr-4">
                                    <div class="bg-sand w-full h-full px-4 flex justify-center items-center">
                                        <a class="" href="{{$permalink}}" data-cursor='link-text'>
                                            <x-picture-fallback src="{{ $src }}" alt="{{ $alt }}" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($data['cards'] as $card)
                                @php
                                    $visual = get_field('visual_logo', $card['brand']->ID);
                                    $alt = $visual['alt'] ?? '';
                                    $src = $visual['sizes']['large'] ?? '';
                                    $permalink = get_permalink($card['brand']->ID);
                                @endphp
                                <div class="swiper-slide pr-6 h-48 w-50 box-content max-sm:w-32 max-sm:h-34 max-sm:pr-4">
                                    <div class="bg-sand w-full h-full px-4 flex justify-center items-center">
                                        <a class="" href="{{$permalink}}" data-cursor='link-text'>
                                            <x-picture-fallback src="{{ $src }}" alt="{{ $alt }}" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center pl-[calc(33%+66px)] mt-7 w-full gutter-R">
                            <div class="swiper-pagination relative inline-flex"></div>
                            <div class="flex gap-9">
                                <div class="swiper-button-prev arrow-left w-6 relative left-0 right-0 mt-0 after:hidden" data-cursor-type="arrow-left" data-cursor-text="" data-cursor-rotate="0"></div>
                                <div class="swiper-button-next arrow-right w-6 relative left-0 right-0 mt-0 after:hidden" data-cursor-type="arrow-right" data-cursor-text="" data-cursor-rotate="0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endif
