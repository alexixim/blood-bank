<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate($this->perPage);

		return View::make('products.list', [
			'products' => $products
		]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$categories = array('') + Category::all()->lists('name', 'id');

		return View::make('products.create', array(
			'categories' => $categories
		));	
	}

	public function validate()
	{
		$rules = array(
			'name' => 'required',
			'validity_period' => 'required',
			'category_id' => 'not_in:0',
			'mil' => 'numeric',
			//'uom' => 'required|numeric',
		);

		$messages = array(
			'name.required' => 'Please enter Product Name.',
			'validity_period.required' => 'Please enter a validity period',
			'category_id.not_in' => 'Please Select a Category ',
			//'uom.required' => 'Please enter UOM',
			'mil.numeric' => 'MIL should be numeric'
			
			
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		return $validator;


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = $this->validate();

		if($validator->fails())
		{
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());
		}

		$product = new Product();

		$product->name = Input::get('name');
		$product->validity_period = Input::get('validity_period');
		$product->category_id = Input::get('category_id');
		$product->uom = Input::get('uom');
		$product->mil = Input::get('mil');


		$product->save();

		Session::flash('success', 'Successfully created Product!');
		return Redirect::route('product.index');

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
		return View::make('products.view');
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
		$product = Product::find($id);

		$categories = array('') + Category::all()->lists('name', 'id');

		return View::make('products.create', array(
			'product' => $product,
			'categories' => $categories
		));	
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
		$validator = $this->validate();

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());	
		}

		$product = Product::find($id);

		$product->name = Input::get('name');
		$product->validity_period = Input::get('validity_period');
		$product->category_id = Input::get('category_id');
		$product->uom = Input::get('uom');
		$product->mil = Input::get('mil');

		$product->save();

		Session::flash('success', 'Successfully updated Product Details!');
		return Redirect::route('product.index');

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
		Product::find($id)->delete($id);
		Session::flash('success', 'Successfully deleted Product!');
		return Redirect::route('product.index');
	}


}
