@props([
  'tags' => [],
  'maxPage' => 1,
  'title' => ''
])
 

<div class="flex flex-col gutter-m-T">
  <div class="gutter-LR title-type9">{{ $title }}</div>
  
  <form id="ajax-filter-form" class="flex gap-4 gutter-LR mt-6 flex-wrap max-sm:gap-2 ">
    <input type="hidden" name="maxPage" value="{{ $maxPage }}">
    <input type="hidden" name="page" value="1">
    @if($tags)
     
        @foreach($tags as $tag)
          <label class="group">
            <input class="hidden" type="checkbox" name="tax" value="{{ $tag['slug'] }}">
            <div class="content-type3 text-dark flex gap-2 items-center border border-black rounded-full px-3 py-2 hover:bg-black hover:text-white group-[.active]:bg-black group-[.active]:text-white transition duration-300 ease-in-out"> 
          
              <div class="w-2 h-2 bg-black rounded-full transition duration-300 ease-in-out group-hover:bg-white group-[.active]:bg-white"></div>
              <p>{{ $tag['name'] }}</p>
            </div>
            
          </label>
        @endforeach 
      
    @endif
   
  </form>
 
  </div>


