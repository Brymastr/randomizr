<?php

class IncomingController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $url
	 * @return Response
	 */
	public function show($url)
	{
		$code_id = DB::table('codes')
			->where('code', $url)
			->first();

		$links = DB::table('links')
			->where('code_id', $code_id->id)
			->get();

		$randomNumber = rand(0, count($links) - 1);

		$chosenLink = $links[$randomNumber]->link;

		return Redirect::to($chosenLink);
	}
}
