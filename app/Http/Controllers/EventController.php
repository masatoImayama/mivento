<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{

	var $directory = "event/";

	public function index()
	{

		$this->page_tag = "event";
		$this->page_title = "イベント";

		return view('event.event')->with([
			"page_tag" => $this->page_tag,
			"page_title" => $this->page_title,
		]);
	}
}
