<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
	    public function employees()
    {
        return $this->belongsTo('App\Employe', 'emp_no');
    }
	protected $primaryKey = 'emp_no';
}
