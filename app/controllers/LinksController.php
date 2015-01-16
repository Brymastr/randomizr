<?php

class LinksController extends \BaseController {

	protected $code;

	public function __construct(Code $code) {
		$this->code = $code;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//		$url = 'http://randomizr.link/incoming/' . $this->code->getToken(25);
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
		$cookie = Cookie::make('linklist', $links, 1);

		return Redirect::to('/')->withCookie($cookie);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
