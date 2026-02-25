@if ($data)

    <div class="relative group overflow-hidden">
        <img class="absolute h-full w-full object-cover -z-10 scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-300 ease-in-out max-md:scale-100 max-md:opacity-100" src="{{$data['visual']['sizes']['large']}}" alt="">
        <div class="top-0 left-0 px-26 py-14 h-full w-full flex flex-col gap-2 max-xl:px-10 max-xl:py-10">  
            <div class="bg-[#F4F2EF] h-full w-full max-w-[410px] mx-auto py-12 px-10 text-center flex flex-col items-center gap-10 max-xl:px-6 max-xl:py-10">
                <img class="w-40 mx-auto" src="{{$data['logo']['url']}}" alt="">
                <div class="content-type4 mt-[20%]">{!! $data['text'] !!}</div>  
            </div>
            @if($data['link']) 
                <div class="max-w-[410px] w-full mx-auto bg-[#F4F2EF] group/btn">
                    <a href="{{ $data['link']['url'] }}" target="{{ $data['link']['target'] }}" rel="@if($data['link']['target'] == '_blank') noopener noreferrer @endif" class="relative btn-bloc text-dark shrink-0 px-6 py-4 flex justify-between items-center " data-cursor-type="link-text">
                        <div class="flex flex-col h-5 box-content overflow-hidden">
                            <span class="group-hover/btn:translate-none -translate-y-full transition-all duration-300 ease-in-out">{{ $data['link']['title'] }}</span>
                            <span class="group-hover/btn:translate-none -translate-y-full transition-all duration-300 ease-in-out">{{ $data['link']['title'] }}</span>
                        </div>
                        
                        <div class="translate-x-0 group-hover/btn:-translate-x-2 transition-all duration-300 ease-in-out {{ ($data['link']['target']) == '_blank' ? '-rotate-45' : '' }}">
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90605 1.78746L9.2317 1.48357L13 5.00008L9.2317 8.5166L8.90605 8.2127L12.1161 5.21715H1.04382V4.78301H12.1161L8.90605 1.78746Z" fill="#1D1D1D" fill-opacity="0.6"/>
                                <path d="M9.40222 8.69922L13.1708 5.18262L13.3661 5L13.1708 4.81738L9.40222 1.30078L9.23132 1.1416L9.0614 1.30078L8.73523 1.60449L8.53992 1.78711L8.73523 1.9707L11.4813 4.5332H0.793823V5.4668H11.4813L8.73523 8.03027L8.53992 8.21289L8.73523 8.39551L9.0614 8.69922L9.23132 8.8584L9.40222 8.69922Z" stroke="#1D1D1D" stroke-opacity="0.6" stroke-width="0.5"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
 

    
@endif
 