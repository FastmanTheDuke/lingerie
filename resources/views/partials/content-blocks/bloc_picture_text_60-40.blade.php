@if($data)
    <section class="flex flex-row gap-[10vw] gutter-LR gutter-m-TB max-md:flex-col-reverse max-md:gap-8">
        <div class="w-[65%] max-md:w-full">
            @if($data['visual'])
                <x-picture-fallback src="{{ $data['visual']['sizes']['large'] }}" alt="{{ $data['visual']['alt'] }}" class="w-full h-full object-cover" />
            @endif
        </div>
        <div class="w-[35%] flex flex-col justify-center items-start gap-7 py-10 max-md:w-full max-md:py-0">
            @if($data['surtitle'])
                <p class="title-type3 text-grey">{{ $data['surtitle'] }}</p>
            @endif
            @if($data['title'])
                <h2 class="title-type2 text-dark">{!! $data['title'] !!}</h2>
            @endif
            @if($data['text'])
                <div class="content-type1-light text-grey">{!! $data['text'] !!}</div>
            @endif
        </div>
    </section>
@endif