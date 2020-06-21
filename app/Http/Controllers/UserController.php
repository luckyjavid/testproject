<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Storage;
use Auth;

class UserController extends Controller
{
	public function index()
	{
		
		/* The old way of doing it */
		// 		DB::insert('insert into users (name,email,password) values (?, ?,?)', ['javid', 'j@gmail.com','password']);
		// 		DB::update('update users set name = "javid Hussain" where name = ?', ['javid']);
		// 		DB::delete('delete from users where name = "javid Hussain"');
		// 		$users = DB::select('select * from users ');
		// 		return $users;

		/* using eloquent */
		// 		$user = new User();
		// 		// 		dd($user);
		// 		$user->name = "Javid Hussain";
		// 		$user->email = "luckyjavid@gmail.com";
		// 		$user->password = bcrypt("pass");
		// 		$user->save();
		
		// 		User::where("name",'Javid Hussain')->update(['email'=>'j@gmail.com']);
		// 		User::where('email', 'luckyjavid@gmail.com')->delete();
		// 		$user = User::all();
		// 		return $user;
		

		/* using eloquent one line method */
		$user = new User();
		$data = [
            'name' => "akbar",
            'email' => 'akabr@gmail.com',
            'password' => 'pass',
        ];
		// 		User::create($data);
		$user = User::all();
		return $user;
		
		// 		return view('about');
	}
	public function uploadAvatar(Request $request){
		if ($request->hasFile('image')) {
			User::uploadAvatar($request->image);
			//$request->session()->flash();
			return redirect()->back()->with('message', 'Upload Successfull!!!');
		}
		return redirect()->back()->with('error', "Image was not uploaded");
	}
}
