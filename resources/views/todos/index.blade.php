@extends('todos.layout')

@section('content')
  
<div class="container ">  
  <div class="row">
    <div class="col s8 m6 offset-m3 offset-s2"> 
      <div class='border-2 border-teal-600 p-4'>
        {{-- top title --}}
        <span class="text-4xl py-4">All Todos</span>
        <a href="{{ route('todo.create') }}">
          <span class="fa fa-plus-square text-4xl text-orange-600 right py-2 "></span> 
        </a>
      </div>
      <ul class='collection'>
        @forelse ($todos as $todo)
        <li class='collection-item'>
          <div>
            <!-- todo item -->
            @if ($todo->Completed)
                <a class='cursor-pointer' href='{{ route('todo.show',$todo->id) }}'><span class="line-through"> {{ $todo->Title }} </span></a>
            @else
                <a class='cursor-pointer' href='{{ route('todo.show',$todo->id) }}'><span> {{ $todo->Title }} </span></a>
            @endif
            
            <span class="right">
               

              <!-- complete button -->
              @include('todos.completeCheckMark')

              <!-- edit button -->
              <span>
                <a href="{{ route('todo.edit',$todo->id) }}" class='px-3'>
                <span  class="fas fa-edit text-teal-600">
                </span>
              </a>
              </span>

              <!-- delete button -->             
              <span onclick="event.preventDefault();
                    if(confirm('wanna delete?')){
                      document.getElementById('form-deleted-{{ $todo->id }}').submit()
                    }
                    " class="fas fa-trash text-red-600 cursor-pointer">
              </span>
              <form style="display: none" id="{{ 'form-deleted-'.$todo->id }}" action={{ route('todo.destroy',$todo->id) }} method='post'>
              @csrf
              @method('delete')
              </form>
            </span>   
          </div>         
        </li>
        @empty 
          <div class='p-3'> No todo, Add one !!! </div>
        @endforelse
      </ul>
      <a href='{{ route('home') }}' class='link underline text-blue-900'> Home</a>
    </div>
  </div>
  </div>
@endsection

   
