@extends('todos.layout')

@section('content')
  <div class="container ">
    <div class="row">
    <div class="col s8 m6 offset-m3 offset-s2">
      <div class="card teal darken-1 ">
        <div class="card-content white-text">
          <span class="card-title">Todos</span>
        <form action="{{ route('todo.store') }}" method="post">
          @csrf
          <input type="text" name="title" id="title" placeholder="enter todo here">
          <textarea name="description" id="" cols="30" rows="40" placeholder="enter description" class="rounded border-1 border-teal-700"></textarea>
          @livewire('step')
          <br>
          <div class="py-10">
            <input type="submit" value="Create" class="waves-effect waves-light btn">
          </div>         
        </form>  
        <br>
        <a href="{{ route('todo.index') }}" ><span class="fas fa-arrow-circle-left text-2xl"></span></a> 
      </div>
    </div>
  </div>
  </div>
  
@endsection