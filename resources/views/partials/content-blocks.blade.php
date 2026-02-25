@if ($blocks)
  <div class="content-blocks">
    @foreach ($blocks as $block)
      @include('partials.content-blocks.' . $block['acf_fc_layout'], ['data' => $blocks[$loop->index],'index' => $loop->index])
    @endforeach
  </div>
@endif
