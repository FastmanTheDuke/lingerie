@if($data)
    <section class="flex flex-row gap-[10vw] gutter-L gutter-m-TB max-md:flex-col max-md:gap-8">
        <div class="w-[35%] flex flex-col justify-center items-start gap-7 py-10 max-md:w-full max-md:py-0">
            <p class="title-type3 text-grey">{{ $data['surtitle'] }}</p>
            <h2 class="title-type2 text-dark">{!! $data['title'] !!}</h2>
            <div class="content-type1-light text-grey">{!! $data['text'] !!}</div>
           

        </div>
        <div class="w-[65%] pl-[6.5%] relative max-md:w-full">
            @if(isset($data['visual']) && $data['visual'])
                <x-picture-fallback src="{{ $data['visual']['sizes']['large'] }}" alt="{{ $data['visual']['alt'] }}" class="w-full h-full object-cover" />
            @endif
            @if(isset($data['visual_2']) && $data['visual_2'])
                <x-picture-fallback src="{{ $data['visual_2']['sizes']['large'] }}" alt="{{ $data['visual_2']['alt'] }}" class="w-1/3 object-cover absolute top-1/2 -translate-y-1/2 left-0" />
            @endif
        </div>
    </section>
@endif