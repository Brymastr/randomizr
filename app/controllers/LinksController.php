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
		$input = Input::get('links');
		$empty = true;
		foreach($input as $i) {
			if(!empty($i)) {
				$empty = false;
				break;
			}
		}
		if($empty) {
			return Redirect::back()->with('error', 'No links');
		}

		$url = $this->code->getToken(5);
		$this->code->code = $url;

		$this->code->save();

		$links = array();
		$links = Input::get('links');

		foreach($links as $l) {
			if(!empty($l)) {
				$link = new Link();
				$link->code_id = $this->code->id;
				if((substr($l, 0, 7) != "http://") && (substr($l, 0, 8) != "https://")) {
					$link->link = "http://$l";
				} else {
					$link->link = $l;
				}

				$link->save();
			}
		}

		return Redirect::to('/')->with('message', $url);
	}

}
