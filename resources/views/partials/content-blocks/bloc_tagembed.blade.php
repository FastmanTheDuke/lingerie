@if($data['html'])
    <section class="gutter-LR gutter-m-TB">
        <div class="flex justify-between items-end max-md:flex-col max-md:items-start max-md:gap-4">
            <div>
                <p class="font-secondary text-[64px] leading-[100%] text-dark block max-lg:text-[54px] max-md:text-[44px] max-sm:text-[34px]">{{ $data['brand'] }}</p>
                <h2 class="font-primary-l text-[55px] leading-[100%] text-dark block max-lg:text-[45px] max-md:text-[35px] max-sm:text-[25px]">{!! $data['title'] !!}</h2> 
            </div>
            @if($data['link'])
                <a href="{{ $data['link']['url'] }}" rel="@if($data['link']['target'] == '_blank') noopener noreferrer @endif" target="{{ $data['link']['target'] }}" class="btn-text text-dark shrink-0" data-cursor-type="link-text">{{ $data['link']['title'] }}</a> 
            @endif
        </div>
        <div class="mt-12">
            {!!$data['html']!!}
        </div>
    </section>    
@endif