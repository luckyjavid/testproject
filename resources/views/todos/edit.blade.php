@extends('todos.layout')

@section('content')
    <nav>
    <div class="nav-wrapper">
      <div class="col s12 center">
        {{ $todo->Title }}
      </div>
    </div>
  </nav>
    <div class="container ">
    <div class="row">
    <div class="col s6 m6 offset-m3" >
      <div class="card teal darken-3 ">
        <div class="card-content white-text">
          <span class="card-title">Update Todos</span>
        <form action="{{ route('todo.update',$todo->id) }}" method="post">
          @csrf
          @method('patch')
          <input type="text" name="title" id="title" value="{{ $todo->Title }}">
          <textarea name="description" id="" cols="30" rows="40"  class="rounded border-1">{{ $todo->description }}</textarea>
          @livewire('edit-step',['steps'=> $todo->steps])
          <input type="submit" value="update" class="waves-effect waves-light btn">
        </form>   
         <br>
          <a href="{{ route('todo.index') }}" ><span class="fas fa-arrow-circle-left text-2xl"></span></a>            
      </div>
    </div>
  </div>
  </div>
@endsection