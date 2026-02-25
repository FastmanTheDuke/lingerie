@if($data)
    <section class="gutter-LR gutter-TB bg-[#F4F2EF] relative">
        <div class="w-full max-w-[80%] flex flex-col gap-6 items-center text-center mx-auto max-sm:max-w-full">
            <h2 class="title-type3 text-dark">{{$data['surtitle']}}</h2>
            <div class="content-type12 text-dark">{!! $data['text'] !!}</div>
            @if($files)
                <div class="mt-6 space-y-6">
                    @foreach($files as $file)
                    <a href="{{$file['file']['url']}}" class="btn-link relative pb-1.5 flex gap-2 after:content-[''] after:block after:w-full after:h-[1px] after:bg-current after:absolute after:bottom-0">
                            <svg class="w-6 h-6" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_2619_2020" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                <rect y="0.5" width="24" height="24" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_2619_2020)">
                                <path d="M12 16.077L8.4615 12.5385L9.16925 11.8192L11.5 14.15V5.5H12.5V14.15L14.8307 11.8192L15.5385 12.5385L12 16.077ZM5 19.5V15.4615H6V18.5H18V15.4615H19V19.5H5Z" fill="#1C1B1F"/>
                                </g>
                            </svg>

                            <p data-cursor-type="link-text">{{$file['file']['title']}}</p>
                        </a>
                       
                    @endforeach
                </div>
            @endif
        </div>

        <div class="absolute z-0 w-screen top-[20%] right-0 max-sm:hidden">
            <svg class="w-full" viewBox="0 0 1412 353" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1331 121C1194.33 194.333 857 343 601 351C281 361 121 311 1 241" stroke="#1D1D1D" stroke-opacity="0.2" stroke-dasharray="14 14"/>
                <path d="M1330.5 121.073C1467.17 194.407 1804.5 343.073 2060.5 351.073C2380.5 361.073 2540.5 311.073 2660.5 241.073" stroke="#1D1D1D" stroke-opacity="0.2" stroke-dasharray="14 14"/>
                <path d="M1761 1C1617 1 1414.33 81 1331 121C1451 177 1667.67 191 1761 191C1891 201 2011 151 2011 101C2011 31 1941 1 1761 1Z" stroke="#1D1D1D" stroke-opacity="0.2" stroke-dasharray="14 14"/>
                <path d="M901 1C1045 1 1247.67 81 1331 121C1211 177 994.333 191 901 191C771 201 651 151 651 101C651 31 721 1 901 1Z" stroke="#1D1D1D" stroke-opacity="0.2" stroke-dasharray="14 14"/>
            </svg>
        </div>

        <div class="absolute z-0 w-screen top-[50%] -translate-y-1/2 right-0 hidden max-sm:block">
            <svg class="w-full" viewBox="0 0 390 177" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M194.875 60.8369C126.542 97.5036 -42.125 171.837 -170.125 175.837C-330.125 180.837 -410.125 155.837 -470.125 120.837" stroke="#1D1D1D" stroke-opacity="0.2" stroke-width="0.5" stroke-dasharray="7 7"/>
                <path d="M194.625 60.8735C262.958 97.5402 431.625 171.874 559.625 175.874C719.625 180.874 799.625 155.874 859.625 120.874" stroke="#1D1D1D" stroke-opacity="0.2" stroke-width="0.5" stroke-dasharray="7 7"/>
                <path d="M409.875 0.836914C337.875 0.836914 236.542 40.8369 194.875 60.8369C254.875 88.8369 363.208 95.8369 409.875 95.8369C474.875 100.837 534.875 75.8369 534.875 50.8369C534.875 15.8369 499.875 0.836914 409.875 0.836914Z" stroke="#1D1D1D" stroke-opacity="0.2" stroke-width="0.5" stroke-dasharray="7 7"/>
                <path d="M-20.125 0.836914C51.875 0.836914 153.208 40.8369 194.875 60.8369C134.875 88.8369 26.5417 95.8369 -20.125 95.8369C-85.125 100.837 -145.125 75.8369 -145.125 50.8369C-145.125 15.8369 -110.125 0.836914 -20.125 0.836914Z" stroke="#1D1D1D" stroke-opacity="0.2" stroke-width="0.5" stroke-dasharray="7 7"/>
            </svg>

        </div>
    </section>
@endif