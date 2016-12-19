<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thankyoupage extends Model
{ public function index()
    {
        return view('pages.thankyoupage');
		 
    }

   
}

