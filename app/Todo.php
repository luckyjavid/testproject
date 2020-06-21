<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Step; 

class Todo extends Model
{
    protected $fillable = ['title','completed','user_id','description',];
    
    /**
     * in route-model binding finds item by title. (not by id)
     */
    // public function getRouteKeyName()
    // {
    //     return 'title';
    // }
    /**
     * Todo has many steps
     */
    public function steps()
    {
       return $this->hasMany(Step::class);
    }
}
