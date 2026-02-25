@if ($blocks)
  <div class="content-blocks relative max-sm:flex max-sm:flex-col-reverse">
    @if($hasSidebar)
      <x-single-sidebar back="{{ $parentUrl }}" author="{{ $author }}" :files="$files" :links="$links"/>
    @endif
 
    <div class="@if($hasSidebar) pl-68 max-md:pl-48 max-sm:pl-0 @endif">
      @foreach ($blocks as $block)
        @include('partials.content-blocks.' . $block['acf_fc_layout'], ['data' => $blocks[$loop->index],'index' => $loop->index])
      @endforeach
    </div>
  </div>
@endif
