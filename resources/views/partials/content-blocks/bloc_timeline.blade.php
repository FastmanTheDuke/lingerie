@if($data)

    <section class="gutter-m-TB px-[180px] !overflow-hidden max-lg:px-[80px] max-md:px-10 max-sm:px-5">
        <div class="w-[35%] flex flex-col justify-center items-start gap-7 max-lg:w-[50%] max-md:w-full">
            <p class="title-type3 text-grey">{!! $data['surtitle'] !!}</p>
            <h2 class="title-type2 text-dark">{!! $data['title'] !!}</h2>
        </div>
        <div class="swiper mt-14 !overflow-visible" data-timeline-slider>
            <div class="swiper-wrapper ">
                @foreach($data['items'] as $item)
                <div class="swiper-slide">
                        <div class="flex gap-10 pb-6" style="background: url('data:image/svg+xml,%3Csvg width=\'412\' height=\'2\' viewBox=\'0 0 412 2\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0.5 1H412\' stroke=\'%231D1D1D\' stroke-opacity=\'0.3\' stroke-dasharray=\'12 12\'/%3E%3C/svg%3E%0A') no-repeat bottom;">
                        <div class="title-type1 text-grey">
                            {{ $item['index']}}
                        </div>
                        <div class="content-type9 text-grey">
                            {!! $item['title'] !!}
                        </div>
                        </div>
                    
                        <div class="content-type1-light text-grey mt-4">
                        {!! $item['text'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
          
        </div>
    </section>
    
@endif