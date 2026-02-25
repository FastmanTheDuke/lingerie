@if($data)

    <section class="gutter-LR gutter-TB overflow-clip">
        <div class="flex justify-between items-end ">

            <div>
                <p class="title-type3 text-dark">{{ $data['surtitle'] }}</p>
                <h2 class="title-type2 text-dark mt-6 block">{!! $data['title'] !!}</h2>
            </div>
            @if($data['link'])
                <a href="{{ $data['link']['url'] }}" class="btn-text text-dark shrink-0">{{ $data['link']['title'] }}</a>
            @endif

        </div>
        
            
            @if($data['cards'])
            <div class="swiper mt-10 !overflow-visible" data-news-slider>
            <div class="swiper-wrapper">
                @foreach($data['cards'] as $card)
                    @if($card)
                        @php
                            $visual = get_field('visual_list', $card['actu']->ID);

                            $alt = $visual['alt'] ?? '';
                            $src = $visual['sizes']['large'] ?? '';
                            $url = get_permalink($card['actu']->ID);
                            $titre = get_the_title($card['actu']->ID);

                            $date = get_field('date', $card['actu']->ID);
                            if($date){
                                $date = str_replace('/', '.', $date);
                            }

                            $tag = '';
                            $terms = get_the_terms($card['actu']->ID, 'tag_actualite');
                            if ($terms && !is_wp_error($terms)) {
                                $tag = $terms[0]->name;
                            }
                        @endphp
                        <div class="swiper-slide">
                            <x-card-actu visual="{{$src}}" titre="{!!$titre!!}" tag="{{$tag}}" url="{{$url}}" date="{{$date}}"/>
                        </div>
                        
                    @endif
                @endforeach
                </div>
          
          </div>
            @endif
        
    </section>

@endif
