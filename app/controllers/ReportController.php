<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getProductDetails() 
	{

		$products = Product::get();
		$result = View::make('reports.productslist', ['products' => $products]);
		return $result;
	}

	public function getDonorDetails(){

		$donors = Donor::get();
		$result = View::make('reports.donorslist', ['donors' => $donors]);
		return $result;
	}

	public function getDonationDetails(){

		$donations = Donation::get();
		$result = View::make('reports.donationslist', ['donations' => $donations]);
		return $result;
	}

	public function getLocationDetails(){

		$locations = Location::get();
		$result = View::make('reports.locationslist', ['locations' => $locations]);
		return $result;
	}

	/*public function index()
	{
		
		return View::make('reports.ui');
	}
*/
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
		//
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
