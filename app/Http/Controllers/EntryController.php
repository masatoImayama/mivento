<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;

class EntryController extends Controller
{

	public function index($hash_key)
	{
		return view('entry.entry');
	}

}
