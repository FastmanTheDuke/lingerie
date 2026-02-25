@if($data)
    <section class="gutter-m-TB gutter-LR">
        <h2 class="mb-12 title-type2 text-center">{!! $data['title'] !!}</h2>

        <div class="grid grid-cols-3 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
            @foreach($data['products'] as $product)
            
                @if($product)
                    @php
                        

                        $alt = $product['visual']['alt'] ?? '';
                        $src = $product['visual']['sizes']['large'] ?? '';
                        $url = $product['product']->guid ?? '';

                        $subtitle = $product['subtitle'] ?? '';
                        $title = $product['title'] ?? '';
                        $brand = $product['brand'] ?? '';
                    
                        
                        $permalink = $card['link']['url'] ?? '';
                      

                        
                    @endphp
                    <x-card-product src="{{$src}}" alt="{{$alt}}" title="{{$title}}" permalink="{{$permalink}}" subtitle="{{$subtitle}}" brand="{{$brand}}"/>
                @endif
            @endforeach
        </div>
        
    </section>
@endif