@if($data['blocs'])
<section class="flex gutter-LR gutter-m-TB gap-6 max-md:flex-col max-md:gap-8">
  @php
  
    $data['blocs'] = reset($data['blocs']);
  @endphp
  <div class="w-1/2 max-md:w-full">
  @if (isset($data['blocs']['blocs'][0]) && $data['blocs']['blocs'][0])
    @include('partials.content-blocks.slot_bloc_2_columns.' . $data['blocs']['blocs'][0]['acf_fc_layout'], ['data' => $data['blocs']['blocs'][0],'index' => 0])
  @endif
  </div>
  <div class="w-1/2 max-md:w-full">
  @if (isset($data['blocs']['blocs'][1]) && $data['blocs']['blocs'][1])
    @include('partials.content-blocks.slot_bloc_2_columns.' . $data['blocs']['blocs'][1]['acf_fc_layout'], ['data' => $data['blocs']['blocs'][1],'index' => 1])
  @endif
  </div>
</section>
 
@endif