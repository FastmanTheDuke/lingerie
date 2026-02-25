@if($data)
    <section class="mx-auto gutter-LR mb-16">
        @if($data['pictures'])
            @switch(count($data['pictures']))
                @case(1)
                    <div class="relative">
                        <x-picture-fallback src="{{ $data['pictures'][0]['visual']['sizes']['large'] }}" alt="{{ $data['pictures'][0]['visual']['alt'] }}" class="w-full h-full object-cover block" />    
                        @if($data['pictures'])
                            <p class="absolute bottom-0 left-0 p-3.5 text-FA text-[14px]">{{$data['pictures'][0]['visual']['caption']}}</p>
                        @endif
                    </div>
                @break

                @default
                    <div class="grid grid-cols-2 gap-6">
                        @foreach($data['pictures'] as $picture)
                            <div class="relative">
                                <x-picture-fallback src="{{ $picture['visual']['sizes']['large'] }}" alt="{{ $picture['visual']['alt'] }}" class="w-full h-full object-cover block" />
                                    @if($data['pictures'])
                                        <p class="absolute bottom-0 left-0 p-3.5 text-FA text-[14px]">{{$picture['visual']['caption']}}</p>
                                    @endif
                            </div>
                        @endforeach
                    </div>
                @break
            @endswitch
       @endif
    </section>
@endif

