<section class="relative border-t-2 border-[#1D1D1D1A] py-10">
  <div class="overflow-hidden whitespace-nowrap bg-white flex animate-marquee-container">
    <div class="flex shrink-0 animate-marquee gap-9 pr-9">
      @foreach($logos as $logo)
        <div class="h-16 shrink-0 block">
          <a href="{{ $logo['permalink'] }}" data-cursor-type="link-text">
            <img class="object-contain block h-full" src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}">
          </a>
        </div>
      @endforeach
      @foreach($logos as $logo)
        <div class="h-16 shrink-0 block">
          <a href="{{ $logo['permalink'] }}" data-cursor-type="link-text">
            <img class="object-contain block h-full" src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}">
          </a>
        </div>
      @endforeach
     
    </div>
    <div class="flex shrink-0 animate-marquee gap-9 pr-9">
      @foreach($logos as $logo)
        <div class="h-16 shrink-0 block">
          <a href="{{ $logo['permalink'] }}" data-cursor-type="link-text">
            <img class="object-contain block h-full" src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}">
          </a>
        </div>
      @endforeach
      @foreach($logos as $logo)
        <div class="h-16 shrink-0 block">
          <a href="{{ $logo['permalink'] }}" data-cursor-type="link-text">
            <img class="object-contain block h-full" src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}">
          </a>
        </div>
      @endforeach
     
    </div>
</section>



