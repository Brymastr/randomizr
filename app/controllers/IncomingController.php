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

		foreach($links as $link) {
			echo $link->link;
		}
	}
}
