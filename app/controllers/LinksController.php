<?php

class LinksController extends \BaseController {

	protected $code;

	public function __construct(Code $code) {
		$this->code = $code;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$url = $this->code->getToken(25);
		$this->code->code = $url;

		$this->code->save();

		$links = array();
		$links = Input::get('links');

		foreach($links as $l) {
			if(!empty($l)) {
				$link = new Link();
				$link->code_id = $this->code->id;
				$link->link = $l;
				$link->save();
			}
		}

		// Cookie that stores created code for one minute
//		$cookie = Cookie::make('linklist', $links, 1);

		return Redirect::to('/')->with('message', $url);
	}

}
