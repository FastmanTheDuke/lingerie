@if($data)
    <section class="mx-auto gutter-LR my-16">
        <div class="px-25 max-lg:px-10 max-md:px-0">
            @if($data['title'] )
                <h2 class="title-type9 text-dark mb-8">{!! $data['title'] !!}</h2>
            @endif
            
            @if($data['text'] )
                <div class="content-type1-light text-grey text-justify">
                    {!! $data['text'] !!}
                </div>
            @endif
        </div>
     
    </section>
@endif