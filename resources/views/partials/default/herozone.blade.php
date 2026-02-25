<section class="gutter-LR gutter-T flex items-center flex-col">
    <div class="flex flex-col gap-6 w-[60%] min-w-[500px] max-md:min-w-full">

        @if(!empty($tags['tag_ml']['name']))
            <div class="content-type3 text-dark flex gap-2 items-center">
                <div class="w-2 h-2 bg-black rounded-full"></div>
                <p>{{ $tags['tag_ml']['name'] }}</p>
            </div>
        @endif
        @if(!empty($tags['tag_ml']['name']))
            <div class="content-type3 text-dark flex gap-2 items-center">
                <div class="w-2 h-2 bg-black rounded-full"></div>
                <p>{{ $tags['tag_ml']['name'] }}</p>
            </div>
        @endif
        <h1 class="title-type10">{!! $title !!}</h1>
        <p class="content-type2 text-lightGrey">{{ $date }}</p>


    </div>
    <x-picture-fallback class="w-full h-full object-cover block z-10 mt-6" src="{{ $visual_herozone }} "
        alt="{{ $title }}" />

</section>