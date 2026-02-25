@if($blocs)
    <div class="gutter-B space-y-10">
        @foreach($blocs as $bloc)
            <div class="gutter-LR">
                @if(!empty($bloc['title']))
                    <div class="title-type8">{!! $bloc['title'] !!}</div>
                @endif
                @if(!empty($bloc['text']))
                    <div class="content-type1-light mt-2">{!! $bloc['text'] !!}</div>
                @endif
            </div>
        @endforeach
    </div>
@endif