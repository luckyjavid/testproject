<span class='cursor-pointer'>
  @if ($todo->Completed)
      <span onclick="event.preventDefault();document.getElementById('form-incompleted-{{ $todo->id }}').submit()" class="fas fa-check text-teal-400"></span>
      <form style="display: none" id="{{ 'form-incompleted-'.$todo->id }}" action={{ route('todo.incomplete',$todo->id) }} method='post'>
      @csrf
      @method('put')
      </form>
  @else 
      <span onclick="event.preventDefault();document.getElementById('form-completed-{{ $todo->id }}').submit()" class="fas fa-check text-gray-300"></span>
      <form style="display: none" id="{{ 'form-completed-'.$todo->id }}" action={{ route('todo.complete',$todo->id) }} method='post'>
      @csrf
      @method('put')
      </form>
  @endif               
</span> 