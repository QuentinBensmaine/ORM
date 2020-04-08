<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $timestamp = false;
    protected $primarykey = 'emp_no';

    protected $guarded = [];

	    public function employees()
    {
        return $this->belongsTo('App\Employee', 'emp_no', 'emp_no');
    }
	protected $primaryKey = 'emp_no';
}
