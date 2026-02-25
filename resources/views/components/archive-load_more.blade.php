@props([
  'maxPage' => 1,
])

<button id="load-more" class="bg-[#F4F2EF] py-2 px-6 font-primary text-dark text-[14px] tracking-[0.5px] uppercase mt-6 scale-100 hover:scale-105 origin-center transition-transform ease-in-out duration-300 @if($maxPage == 1) opacity-0 invisible @endif">{{ $slot }}</button>