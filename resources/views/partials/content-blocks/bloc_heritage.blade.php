@if($data)
    <section class="relative gutter-TB">
        <div class="w-full mx-auto max-w-[1200px] gutter-LR">
            

      
           
            <div class="flex gap-6 relative max-md:gap-3">
                @if($data['visual_1'])
                    <img class="w-full bg-cover bg-center z-0" src="{{$data['visual_1']['sizes']['large']}}" alt="{{ $data['visual_1']['alt'] }}"/>
                @endif
                @if($data['visual_2'])
                    <img class="w-full bg-cover bg-center z-0" src="{{$data['visual_2']['sizes']['large']}}" alt="{{ $data['visual_2']['alt'] }}"/>
                @endif
                @if($data['visual_3'])
                    <img class="w-full bg-cover bg-center z-0" src="{{$data['visual_3']['sizes']['large']}}" alt="{{ $data['visual_3']['alt'] }}"/>
                @endif
                <div class="absolute -z-10 w-screen bottom-0 left-1/2 -translate-x-1/2 translate-y-[60%] ">
                    <svg class="w-full" viewBox="0 0 1440 353" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M732 121C595.333 194.333 258 343 2 351C-318 361 -478 311 -598 241" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                        <path d="M731.5 121.073C868.167 194.407 1205.5 343.073 1461.5 351.073C1781.5 361.073 1941.5 311.073 2061.5 241.073" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                        <path d="M1162 1C1018 1 815.333 81 732 121C852 177 1068.67 191 1162 191C1292 201 1412 151 1412 101C1412 31 1342 1 1162 1Z" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                        <path d="M302 1C446 1 648.667 81 732 121C612 177 395.333 191 302 191C172 201 52 151 52 101C52 31 122 1 302 1Z" stroke="#1D1D1D" stroke-opacity="0.3" stroke-dasharray="14 14"/>
                    </svg>
                </div>
            </div>
        
            
            <div class="flex flex-col justify-center items-center gap-6 mt-20 max-sm:mt-10">
                <p class="title-type3 text-dark">{{ $data['surtitle'] }}</p>
                <h2 class="title-type2 text-dark block text-center">{!! $data['title'] !!}</h2>
                @if($data['link'])
                    <a href="{{ $data['link']['url'] }}" class="btn-text text-dark shrink-0 mt-4" data-cursor-type="link-text">{{ $data['link']['title'] }}</a>
                @endif
            </div>
        </div>

    </section>
@endif

