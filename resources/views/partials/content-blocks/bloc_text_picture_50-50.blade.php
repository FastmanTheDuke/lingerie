@if($data)
    <section class="flex flex-row justify-between gutter-LR items-center gutter-m-TB max-md:flex-col max-md:gap-8">
        <div class="w-[calc(50%-50px)] flex flex-col justify-center items-start gap-7 max-md:w-full">
            @if($data['left']['surtitle'])
                <p class="title-type3 text-grey">{{ $data['left']['surtitle'] }}</p>
            @endif
            @if($data['left']['title'])
                <h2 class="title-type2 text-dark">{!! $data['left']['title'] !!}</h2>
            @endif
            @if($data['left']['text'])
                <div class="content-type1-light text-grey">{!! $data['left']['text'] !!}</div>
            @endif
            @if(isset($data['left']['visual']) && $data['left']['visual'])
                <x-picture-fallback src="{{ $data['left']['visual']['sizes']['large'] }}" alt="{{ $data['left']['visual']['alt'] }}" class="w-full" />
            @endif
        </div>
        <div class="w-[calc(50%-50px)] flex flex-col justify-center items-start gap-7 max-md:w-full">
            @if($data['right']['surtitle'])
                <p class="title-type3 text-grey">{{ $data['right']['surtitle'] }}</p>
            @endif
            @if($data['right']['title'])
                <h2 class="title-type2 text-dark">{!! $data['right']['title'] !!}</h2>
            @endif
            @if($data['right']['text'])
                <div class="content-type1-light text-grey">{!! $data['right']['text'] !!}</div>
            @endif
            @if(isset($data['right']['visual']) && $data['right']['visual'])
                <x-picture-fallback src="{{ $data['right']['visual']['sizes']['large'] }}" alt="{{ $data['right']['visual']['alt'] }}" class="w-full" />
            @endif
        </div>
    </section>
@endif