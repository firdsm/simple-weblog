<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
    	return view('login.register');
    }

    public function store(RegistrationForm $form)
    {    	
        $form->persist();    	

    	return redirect('/');
    }
}
