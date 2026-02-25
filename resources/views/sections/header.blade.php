<header class="fixed top-0 w-full z-40 h-[113px] flex py-4 px-8 group items-center max-sm:px-5 @if(!$headerLarge) is-small is-scrolled @endif">
  <div class="absolute w-full h-full top-0 left-0 bg-gradient-to-b from-black/50 to-transparent -z-20"></div>
  <div class="absolute w-full h-full top-0 left-0 bg-white -z-10 invisible opacity-0 group-[.is-scrolled]:visible group-[.is-scrolled]:opacity-100 transition-opacity duration-300"></div>
  <a class="logo w-[122px] absolute z-10" href="{{ pll_home_url() }}" data-cursor-type="simple">
    <img class="w-full h-full block" src="{{$logo}}" alt="{{$siteName}}" />
  </a>
  <a class="logo-mini absolute w-[90px] opacity-0 invisible z-10" href="{{ pll_home_url() }}" data-cursor-type="simple">
    <img class="w-full h-full block" src="{{$logoMini}}" alt="{{$siteName}}" />
  </a>

  <div class="menu-container w-full flex items-center max-md:bg-white z-0 max-md:h-svh max-md:w-full max-md:absolute max-md:top-0 max-md:left-0 max-md:flex-col max-md:justify-center max-md:items-start max-md:gap-10 max-md:opacity-0 max-md:invisible">
    @if($menu)
      <div class="pl-40 max-md:pl-20 max-sm:pl-10 w-full">
        <div class="flex gap-8 items-center max-md:flex-col max-md:items-start relative">
          @foreach($menu as $menuItem)
            <div class="menu-item @if($menuItem['children']) has-children @endif" data-item-id="{{$menuItem['ID']}}" >
              <a class="@if($menuItem['active']) !underline @endif menu-type1 underline-offset-4 !no-underline text-[#FAFAFA] group-[.is-scrolled]:text-[#4E4D49] transition-all duration-300 max-md:text-[#4E4D49]" href="{{$menuItem['url']}}" data-cursor-type="simple">{{$menuItem['title']}}</a>
            </div>
            @if($menuItem['children'])
              <div class="menu-item-sub absolute flex shrink-0 top-full mt-5 left-0 w-full opacity-0 invisible max-md:hidden" data-parent-id="{{$menuItem['ID']}}">
                <div class=" flex shrink-0 w-auto">
                  <div class="flex shrink-0">
                    @php
                      $randomChild = $menuItem['children'][array_rand($menuItem['children'])];
                      $visual = get_field('visual_9-16', $randomChild['ID_post']); 
                      $link = $randomChild['url'];
                    @endphp
                  <a class="absolute h-full aspect-square menu-item-sub-picture" href="{{ dirname($link) }}" data-cursor-type="link-text">
                    <img class="block h-full w-full object-cover object-top absolute grayscale-100" src="{{ $visual['sizes']['large'] }}" alt="">
                    <div class="flex justify-between items-center absolute bottom-0 p-2 w-full">
                      <p class=" font-primary text-[16px] leading-[110%] uppercase text-white !no-underline">{{pll_e('voir tout')}}</p>
                      <div class="arrow-right w-5 h-5 invert-100"></div>
                    </div>
                  </a>
                 
                
                   
                  </div>
                  <div class="block h-full aspect-square"></div>
                  <div class="menu-item-sub-items grid grid-cols-3 gap-x-12 gap-y-7 py-10 px-10 shrink-0 bg-white">
                    @foreach($menuItem['children'] as $child)
                      <a class="menu-item-sub-entry font-primary text-[16px] leading-[110%] uppercase text-dark !no-underline shrink-0" href="{{$child['url']}}" data-cursor-type="simple">{{$child['title']}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    @endif

    @if($menuright)
      <div class="flex gap-8 items-center pl-[122px] ml-auto max-md:pl-20 max-md:ml-0 max-sm:pl-10">
        @foreach($menuright as $menuItem)
          <a class="menu-item bg-white font-secondary text-[18px] !no-underline px-6 py-2 uppercase font-bold text-dark flex gap-4 items-center justify-center shrink-0 whitespace-nowrap group/btn max-md:px-0" target="_BLANK" href="{{$menuItem['url']}}" data-cursor-type="link-text">
            {{$menuItem['title']}}
            <div class="translate-x-0 group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-all duration-300 ease-in-out -rotate-45 origin-center">
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.90605 1.78746L9.2317 1.48357L13 5.00008L9.2317 8.5166L8.90605 8.2127L12.1161 5.21715H1.04382V4.78301H12.1161L8.90605 1.78746Z" fill="#1d1d1d" fill-opacity="1" />
                <path d="M9.40222 8.69922L13.1708 5.18262L13.3661 5L13.1708 4.81738L9.40222 1.30078L9.23132 1.1416L9.0614 1.30078L8.73523 1.60449L8.53992 1.78711L8.73523 1.9707L11.4813 4.5332H0.793823V5.4668H11.4813L8.73523 8.03027L8.53992 8.21289L8.73523 8.39551L9.0614 8.69922L9.23132 8.8584L9.40222 8.69922Z" stroke="#1d1d1d" stroke-opacity="1" stroke-width="0.5" />
              </svg>
            </div>
          </a>
        @endforeach
      </div>
    @endif
  </div>

  <div class="menu-trigger z-10 h-3 w-8 flex-col items-end justify-between ml-auto hidden max-md:flex">
    <div class="w-8 h-[1px] bg-[#1d1d1d]"></div>
    <div class="w-6 h-[1px] bg-[#1d1d1d]"></div>
  </div>
</header>
