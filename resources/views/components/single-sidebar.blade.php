@props([
    'back' => '',
    'author' => '',
    'files' => [],
    'links' => [],
])

<div class="sidebar absolute w-72 gutter-L pr-4 max-md:w-52 max-sm:relative max-sm:w-full max-sm:pr-5">
    <div class="flex flex-col">
        <div class="pb-6  max-sm:hidden">
            <a class="btn-bloc group/btn flex gap-4 items-center " href="{{$back}}">
                <div class="translate-x-0 group-hover/btn:-translate-x-2 transition-all duration-300 ease-in-out rotate-180">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.90605 1.78746L9.2317 1.48357L13 5.00008L9.2317 8.5166L8.90605 8.2127L12.1161 5.21715H1.04382V4.78301H12.1161L8.90605 1.78746Z" fill="#1D1D1D" fill-opacity="0.6"/>
                        <path d="M9.40222 8.69922L13.1708 5.18262L13.3661 5L13.1708 4.81738L9.40222 1.30078L9.23132 1.1416L9.0614 1.30078L8.73523 1.60449L8.53992 1.78711L8.73523 1.9707L11.4813 4.5332H0.793823V5.4668H11.4813L8.73523 8.03027L8.53992 8.21289L8.73523 8.39551L9.0614 8.69922L9.23132 8.8584L9.40222 8.69922Z" stroke="#1D1D1D" stroke-opacity="0.6" stroke-width="0.5"/>
                    </svg>
                </div>
                {{ pll_e('retour') }}
            </a>
        </div>
        @if($author)
            <div class="py-6 border-t-1 border-[#6D6D6D80]">
                <p class="text-grey">{{ pll_e('Rédigé par') }}</p>
                <p class="btn-link">{{$author}}</p>
            </div>
        @endif 
        @if($files)
            <div class="py-6 border-t-1 border-[#6D6D6D80]">
                <p class="text-grey mb-2">{{ pll_e('Documents') }}</p>
                <div class="space-y-2">
                    @foreach($files as $file)
                    <div class="flex gap-2 group/link items-center">
                        <svg class="w-8 h-8 group-hover/link:scale-120 transition-all duration-300 ease-in-out" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_2619_2222" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_2619_2222)">
                                <path d="M12 15.577L8.4615 12.0385L9.16925 11.3192L11.5 13.65V5H12.5V13.65L14.8307 11.3192L15.5385 12.0385L12 15.577ZM5 19V14.9615H6V18H18V14.9615H19V19H5Z" fill="#1D1D1D"/>
                            </g>
                        </svg>

                        <a href="{{$file['file']['url']}}" class="btn-link">{!! $file['file']['title'] !!}</a>
                    </div>
                        
                    @endforeach
                </div>
                
            </div>
        @endif
        @if($links)
            <div class="py-6 border-t-1 border-[#6D6D6D80]">
                <p class="text-grey mb-2">{{ pll_e('Liens') }}</p>
                <div class="space-y-2">
                    @foreach($links as $link)
                        @if($link['link'])
                            <div class="flex gap-2 group/link items-center">
                                <svg class="w-6 h-6 flex-shrink-0 group-hover/link:scale-120 transition-all duration-300 ease-in-out" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0115 7.95264L6.85292 7.95264C5.67327 7.95264 4.53155 8.41599 3.6943 9.26564C2.85705 10.1153 2.38138 11.2545 2.40046 12.471C2.38133 13.6875 2.85719 14.8269 3.6943 15.6764C4.55051 16.5453 5.65413 17.0088 6.83382 17.0088H9.9924M13.9883 17.0474H17.1469C18.3265 17.0474 19.4683 16.584 20.3055 15.7344C21.1428 14.8847 21.6184 13.7455 21.5993 12.529C21.5993 11.3319 21.1237 10.1926 20.2864 9.34298C19.4492 8.49333 18.3266 8.01062 17.1469 8.0106H13.9883M7.25235 12.4578L16.7281 12.4578" stroke="#1D1D1D" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <a target="{{ $link['link']['target'] }}" href="{{$link['link']['url']}}" class="btn-link">{{$link['link']['title']}}</a>
                            </div>
                        @endif
                        
                    @endforeach
                </div>
                
            </div>
        @endif
    </div>
</div>

