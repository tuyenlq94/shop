<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;

use App\Http\Services\Product\ProductAdminService;

class ProductController extends Controller {
	protected $productService;

	public function __construct( ProductAdminService $productService ) {
		$this->productService = $productService;
	}

	public function index() {
		return view('admin.product.list', [
			'title'    => 'Danh sách sản phẩm',
			'products' => $this->productService->get(),
		]);
	}

	public function create() {
		return view( 'admin.product.add', [
			'title' => 'Thêm Sản phẩm mới',
			'menus' => $this->productService->getMenu(),
		] );
	}

	public function store( ProductRequest $request ) {
		$this->productService->insert( $request );

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
	}
}
