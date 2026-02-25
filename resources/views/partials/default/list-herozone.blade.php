@if($title || $text || $surtitle)
  <section class="gutter-LR gutter-m-TB overflow-hidden max-md:!mt-22">
    <div class="flex flex-col gap-8 px-20 max-lg:px-0">
        <div class="flex flex-col-reverse gap-6 pr-[40%] relative max-lg:pr-0">
            @if($title)
              <h1 class="title-type6">{!! $title !!}</h1>
            @endif
            @if($surtitle)
              @php
                $surtitleSlug = iconv('UTF-8', 'ASCII//TRANSLIT', $surtitle);
                $surtitleSlug = strtolower('herozone-' . $surtitleSlug);
              @endphp
              <h2 class="title-type3 text-grey">{{ pll_e($surtitleSlug) }}</h2>
            @endif

            <div class="absolute -z-10 w-screen bottom-0 right-0 translate-x-1/2 top-1/2 -translate-y-1/2">
                <svg class="w-full" viewBox="0 0 1440 353" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M732 121C595.333 194.333 258 343 2 351C-318 361 -478 311 -598 241" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                    <path d="M731.5 121.073C868.167 194.407 1205.5 343.073 1461.5 351.073C1781.5 361.073 1941.5 311.073 2061.5 241.073" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                    <path d="M1162 1C1018 1 815.333 81 732 121C852 177 1068.67 191 1162 191C1292 201 1412 151 1412 101C1412 31 1342 1 1162 1Z" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                    <path d="M302 1C446 1 648.667 81 732 121C612 177 395.333 191 302 191C172 201 52 151 52 101C52 31 122 1 302 1Z" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                </svg>
            </div>
        </div>
        @if($text)
          <div class="content-type1 text-grey pr-[40%] max-md:pr-0">{!! $text !!}</div>
        @endif
    </div>
  </section>
@endif

