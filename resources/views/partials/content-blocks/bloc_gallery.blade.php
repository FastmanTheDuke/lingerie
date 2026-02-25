@if($data)

    <section class="gutter-TB pl-[180px] bg-dark relative max-md:pl-[80px]">
    <div class="absolute text-vertical">
        <p class="text-[#D1D0D0] whitespace-nowrap title-type7 !tracking-normal max-md:pl-[80px] max-md:!text-[24px]">{{ $data['title'] }}</p>
    </div>
        <div class="swiper" data-gallery-slider>
            <div class="swiper-wrapper">
                @foreach($data['pictures'] as $picture)
                    @if($picture['picture'])
                    @php 

                    @endphp
                        <div class="swiper-slide" data-cursor-type="plus" data-lightbox-alt="{{ $picture['picture']['alt'] }}" data-lightbox-src="{{ getPictureFallbackSrc($picture['picture']['sizes']['large']) }}" data-lightbox-group="{{ 'gallery-'. $index}}">
                            <div class="slide-inner">
                                <x-picture-fallback src="{{$picture['picture']['sizes']['medium_large']}}" alt="{{$picture['picture']['alt']}}" />
                            </div>
                            @if($picture['picture']['alt'])
                                <p class="content-type10 text-[#D1D0D0] pt-1.5">{{ $picture['picture']['alt'] }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
               
            </div>
            <div class="swiper-button-prev absolute w-8 h-8 box-content p-3 left-14 right-0 mt-0 -translate-y-1/2 bg-white rounded-full after:hidden max-md:left-7 max-sm:hidden" data-cursor-type="arrow-left">
                <div class="arrow-left w-6 h-6"></div>
            </div>
            <div class="swiper-button-next absolute w-8 h-8 box-content p-3 right-14 mt-0 -translate-y-1/2 bg-white rounded-full after:hidden max-md:right-7 max-sm:hidden" data-cursor-type="arrow-right">
                <div class="arrow-right w-6 h-6"></div>
            </div>
        </div>
    </section>
    
@endif