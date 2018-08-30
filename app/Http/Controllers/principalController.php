<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class principalController extends Controller
{
    public function index()
	{
		$title = 'Inicio';
		return view('index',compact('title'));
	}

	
}
