<div>
    <div class='py-4'>
          <p class='float-left'> Add steps </p>  
          <span wire:click='inc' class="fas fa-plus px-4" ></span>

          @foreach ($steps as $key => $step)
              <div class='flex' wire:key="{{ $key }}">
              <input type="text" class="left" name="steps[]"  />
              <div wire:click='remove({{ $key }})' class="fas fa-times-circle text-white-900 py-5 cursor-pointer text-2xl" ></div>
              </div>
          @endforeach

    </div>
    <div>
        <span wire:click='ddd()'>Die Dump</span>
    </div>
</div>
