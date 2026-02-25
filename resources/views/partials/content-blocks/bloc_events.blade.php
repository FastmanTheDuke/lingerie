@if($data)

    <section class="relative bloc-events">
        
        <x-picture-fallback class="w-full z-0 object-cover h-[800px] max-md:h-[600px]" src="{{$data['visual']['sizes']['large']}}"/>
        @if($data['video'])
            <video src="{{ $data['video']['url'] }}" class="w-full h-full object-cover block z-0 absolute top-0" autoplay loop muted playsinline></video>
        @endif
        <div class="absolute top-0 z-10 gutter-LR gutter-TB flex flex-col h-full w-full">
            <p class="title-type3 text-white">{{ $data['surtitle'] }}</p>
            <h2 class="title-type2 text-white w-2/5 mt-6 mb-16 max-lg:w-2/3 max-xs:w-full">{!! $data['title'] !!}</h2>
           
            @if($data['link'])
                <a href="{{ $data['link']['url'] }}" class="btn-text text-white mt-auto" data-cursor-type="link-text">{{ $data['link']['title'] }}</a>
            @endif

        </div>
    </section>
    
@endif