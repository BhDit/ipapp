<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thankyoupage extends Model
{ public function index()
    {
        return view('pages.thankyoupage');
		 if($_POST["message"]) {
    mail("nicuandreeaelena@yahoo.com", "Form to email message", $_POST["message"], "From: an@email.address");
}
    }

   
}

