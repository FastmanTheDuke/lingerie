@if ($data)
    
    <div class="relative group overflow-hidden">
    
        <div class="top-0 left-0 px-26 py-14 h-full w-full flex flex-col gap-2 max-xl:px-0 max-xl:py-10 max-md:p-0">
            <div class="bg-[#F4F2EF] h-full w-full max-w-[410px] mx-auto py-12 px-10 text-left flex flex-col items-start gap-4 max-xl:px-6 max-xl:py-10 max-md:max-w-full">
                <div class="title-type3">{{ $data['surtitle'] }}</div> 
                <div class="title-type2 max-lg:!text-[46px] max-sm:!text-[32px]">{{ $data['title'] }}</div> 
                <div class="content-type4 mt-[10%] text-grey">{!! $data['text'] !!}</div> 
            
            </div>
            @if($data['link']) 
                <div class="max-w-[410px] w-full mx-auto bg-black group/btn max-md:max-w-full">
                    <a href="{{ $data['link']['url'] }}" target="{{ $data['link']['target'] }}" rel="@if($data['link']['target'] == '_blank') noopener noreferrer @endif" class="relative btn-bloc text-FA shrink-0 px-6 py-4 flex justify-between items-center" data-cursor-type="link-text">
                        <div class="flex flex-col h-5 box-content overflow-hidden">
                            <span class="group-hover/btn:translate-none -translate-y-full transition-all duration-300 ease-in-out">{{ $data['link']['title'] }}</span>
                            <span class="group-hover/btn:translate-none -translate-y-full transition-all duration-300 ease-in-out">{{ $data['link']['title'] }}</span>
                        </div>
                        
                        <div class="translate-x-0 group-hover/btn:-translate-x-2 transition-all duration-300 ease-in-out {{ ($data['link']['target']) == '_blank' ? '-rotate-45' : '' }}">
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.90605 1.78746L9.2317 1.48357L13 5.00008L9.2317 8.5166L8.90605 8.2127L12.1161 5.21715H1.04382V4.78301H12.1161L8.90605 1.78746Z" fill="#FAFAFA" fill-opacity="1"/>
                                <path d="M9.40222 8.69922L13.1708 5.18262L13.3661 5L13.1708 4.81738L9.40222 1.30078L9.23132 1.1416L9.0614 1.30078L8.73523 1.60449L8.53992 1.78711L8.73523 1.9707L11.4813 4.5332H0.793823V5.4668H11.4813L8.73523 8.03027L8.53992 8.21289L8.73523 8.39551L9.0614 8.69922L9.23132 8.8584L9.40222 8.69922Z" stroke="#FAFAFA" stroke-opacity="1" stroke-width="0.5"/>
                            </svg>
                        </div>
                   
                    </a>
                </div>
            @endif
        </div>
    </div>
 

    
@endif
 