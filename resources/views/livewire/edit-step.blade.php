<div>
    {{-- {{ dd($steps) }} --}}
    <div class='py-4'>
          <p class='float-left'> Update steps </p>  
          {{-- <span wire:click='inc' class="fas fa-plus px-4" ></span> --}}
          <br>
          @foreach ($steps as $key => $step)
              {{-- {{ dd($key,$step) }} --}}
              <div class='flex' wire:key="{{ $key }}">
              <input type="text" class="left" name="stepName[]"  value="{{ $step['name'] }}" />
              <input type="hidden"  name="stepId[]" value="{{ $step['id'] }}" />
              <div wire:click='remove({{ $key }})' class="fas fa-times-circle py-5 cursor-pointer text-2xl" ></div>
            </div>
          @endforeach

    </div>
</div>
