<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{

	public function index()
	{
		return view('event.events')->with([
		]);
	}

	public function edit()
	{
		return view('event.edit')->with([
		]);
	}
}
