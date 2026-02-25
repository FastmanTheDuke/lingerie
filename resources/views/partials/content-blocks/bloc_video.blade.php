@if($data)

    <section class="gutter-LR gutter-m-TB bloc-video">
        <h2 class="title-type2 text-dark w-2/5 mt-6 mb-8 max-lg:w-2/3 max-xs:w-full">{!! $data['title'] !!}</h2>
        <div class="relative aspect-video overflow-clip">
            <x-picture-fallback class="video-poster w-full h-full absolute top-0 left-0 z-0 object-cover" src="{{$data['visual']['sizes']['large']}}"/>
            @if($data['iframe_youtube'])
                <div class="iframe-wrapper-16-9 h-full w-full">
                    {!! $data['iframe_youtube'] !!}
                </div>
            @endif
            <div class="video-info absolute bottom-0 z-10 gutter-LR pb-16 flex w-2/3 gap-8 items-center max-md:w-full max-xs:gap-4 max-xs:pb-8">
                <div class="play-btn flex shrink-0 items-center justify-center w-10 h-10 box-content p-3 bg-white rounded-full max-xs:w-5 max-xs:h-5" data-cursor-type="play" data-cursor-text="" data-cursor-rotate="0">
                    <div class="icon-play w-5 h-5"></div>
                </div>
                <p class="title-type12 text-white">{{ $data['title_video'] }}</p>
            </div>
        </div>
       
    </section>
    
@endif