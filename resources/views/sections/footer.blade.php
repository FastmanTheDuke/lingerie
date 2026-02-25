<x-marquee/>

@include('partials.lightbox')

<footer class="gutter-LR pb-4 pt-16 bg-[#F4F2EF]">
    <div class="flex justify-center gap-20 max-md:gap-y-8 max-md:gap-x-0 max-md:justify-between max-md:flex-wrap">
        @if(${'footermenu1'})
            <div class="flex flex-col gap-4 max-md:w-[45%]">
                @foreach(${'footermenu1'} as $menuItem)
                    <a class="title-type5 !no-underline text-dark" href="{{$menuItem['url']}}"  data-cursor-type="simple">{!! $menuItem['title'] !!}</a>
                @endforeach
            </div>
        @endif
        @if(${'footermenu2'})
            <div class="flex flex-col gap-4 max-md:w-[45%]">
                @foreach(${'footermenu2'} as $menuItem)
                    <a class="title-type5 !no-underline text-dark" href="{{$menuItem['url']}}"  data-cursor-type="simple">{!! $menuItem['title'] !!}</a>
                @endforeach
            </div>
        @endif
        @if(${'footermenu3'})
            <div class="flex flex-col gap-4 max-md:w-[45%]">
                @foreach(${'footermenu3'} as $menuItem)
                    <a class="title-type5 !no-underline text-dark" href="{{$menuItem['url']}}"  data-cursor-type="simple">{!! $menuItem['title'] !!}</a>
                @endforeach
            </div>
        @endif
        @if(${'social'})
            <div class="flex gap-4 max-md:w-[45%]">
                @foreach(${'social'} as $menuItem)
                    <a class="w-6 h-6 icon-{{ $menuItem['label'] }} !no-underline text-dark" rel="noopener noreferrer"  data-cursor-type="link-text" target="_BLANK" href="{{$menuItem['url']}}"></a>
                @endforeach
            </div>
        @endif
    </div>
    <div class="flex justify-between items-center mt-10 gap-5">
        <div class="font-primary-l text-[14px]">
            &copy; {{ $siteName }} {{ date('Y') }} - {{ pll_e('Tous droits réservés') }}
        </div>
        <div>
            @if(${'language'})
                <div class="flex divide-x-1 divide-dark">
                    @foreach(${'language'} as $menuItem)
                        <a class="px-3 !no-underline text-dark font-primary uppercase text-[14px] @if($menuItem['active']) font-primary-sb !underline @endif" href="{{$menuItem['url']}}" data-cursor-type="simple">{{ $menuItem['title'] }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</footer>
