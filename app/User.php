<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
	use Notifiable;
	
	
	
	/**
	* The attributes that are mass assignable.
    *
    * @var array
    */
    // 	protected $guarded = [];
	protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];
	
	
	
	/**
	* The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/**
	* The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	/** 
	* Mutate and add bcrypt to password field
    */
    // 	public function setPasswordAttribute($password)
    // 	{
    // 		$this->attributes['password'] = bcrypt($password);
    //
    //
	//  }
	
	/**
	* Accessor
		     */
		    // 	public function getNameAttribute($name)
		    // 	{
		// 		return 'My name is: '.ucfirst($name);
		//
		//
	//}
	
	public static function uploadAvatar($image)
	{
		$fileName = $image->getClientOriginalName();
		(new self())->deleteOldAvatar();
		$image->storeAs("images", $fileName, "public");
		Auth::user()->update(['avatar' => $fileName]);	
	}
	protected function deleteOldAvatar()
	{
		if($this->avatar){
			Storage::delete('public/images/'.$this->avatar);
		}
	}
	/**
	 * creating one-to-many relationship
	 */
	public function todos()
	{
		return $this->hasMany(Todo::class,'user_id');
	}
}
