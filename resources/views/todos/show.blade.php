@extends('todos.layout')

@section('content')
  <div class="container ">
    <div class="row">
    <div class="col s8 m6 offset-m3 offset-s2">
      <div class="card teal darken-1 ">
        <div class="card-content white-text">
          <span class="card-title text-3xl">Todo Details</span>
          <hr class='py-3'>
          <div> 
            <p class="text-2xl"> Title</p>
            <div> {{ $todo->Title }} </div>
             <br>
            <p class="text-2xl">Description </p>        
            <div class=''> {{ $todo->description }} </div>
            <br> 
            @if ($todo->steps->count()>0)
                <div> 
                  <div class="text-lg">Steps</div>
                  @foreach ($todo->steps as $step)
                      <div> 
                        {{ $step->name }}
                      </div>
                  @endforeach
                </div>
            @endif
            
          </div>
        <br>
        <a href="{{ route('todo.index') }}" ><span class="fas fa-arrow-circle-left text-2xl"></span></a> 
      </div>
    </div>
  </div>
  </div>
  
@endsection