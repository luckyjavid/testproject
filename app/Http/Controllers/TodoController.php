<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoCreateRequest;
use App\Step;

class TodoController extends Controller
{
	/**
	 * Applying middleware 'auth' in order to 
	 * give access to authenticated users
	 */
	public function __construct()
	{
		$this->middleware('auth');
		// $this->middleware('auth')->except('index');
		// $this->middleware('auth')->only('index');
	}

	public function index(){
		// $todos = Todo::all();
		// $todos = Todo::orderBy('completed')->get();
		$todos = auth()->user()->todos()->orderBy('completed')->get();
		return view('todos.index')->with(['todos' => $todos]);
	}
	public function create(){
		return view('todos.create');
	}
	public function store(TodoCreateRequest $request){
		// $request->validate([
		// 	'title' => 'required|max:255',
		// ]);

		// $rules = ['title' => 'required|max:255'];
		// $messages = [
		// 	'title.max' => 'Under 255 chars',
		// ];
		// $validator = Validator::make($request->all(),$rules,$messages);
		// if($validator->fails()){
		// 	return redirect()->back()->withErrors($validator)->withInput();
		// }
		// dd($request->all());
		// $user_id = auth()->id();
		// $request['user_id'] = $user_id;	
		// Todo::create($request->all());  
		$todo = auth()->user()->todos()->create($request->all());
		/**
		 * if the http <<request>> has steps then create steps in database
		 */
		// dd($request->steps);
		if($request->steps){
			foreach ($request->steps as $step) {
				$todo->steps()->create(['name'=>$step]);
			}
		}
		return redirect(route('todo.index'))->with('message',"todo created !!!");
  }
	// public function edit($id){
	// 	$todo = Todo::find($id);
	// 	// return $todo;
	// 	return view('todos.edit',compact('todo'));
  // }
	public function edit(Todo $todo){
		return view('todos.edit',compact('todo'));
	}
	
	public function update(Request $request, Todo $todo)
	{
		$request->validate(['title'=>'required|max:255','description'=>'required']);
		$todo->update([
			'title'=> $request->title, 
			'description'=>$request->description
		]);
		// dump($request->all());
		if($request->stepName){
			foreach ($request->stepName as $key => $value) {
				// get id
				$id = $request->stepId[$key];
				// find step from model using the id
				if(!$id){
					$todo->steps()->create(['name'=>$value]);
				}
				else{
					$step = Step::find($id); 
					$step->update(['name'=>$value]);
				}				
			}
		}
		return redirect(route('todo.index'))->with('message','Updated!');
	}
	 
	public function complete(Todo $todo)
	{
		$todo->update(['completed'=>true]);
		return redirect()->back()->with('message','Task Completed!');
	}
	public function incomplete(Todo $todo)
	{
		$todo->update(['completed'=>false]);
		return redirect()->back()->with('message','Task made InComplete!');
	}
	public function destroy(Todo $todo)
	{
		$todo->steps->each->delete();
		$todo->delete( );
		return redirect()->back()->with('message','Item was deleted!');
	}
	public function show(Todo $todo)
	{
		return view('todos.show',compact('todo'));
	}
}

