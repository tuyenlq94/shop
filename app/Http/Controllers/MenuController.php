<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class MenuController extends Controller {

	protected $menu;

	public function __construct( MenuService $menuService ) {
		$this->menuService = $menuService;
	}
	public function index( Request $request, $id, $slug = '' ) {
		$menu     = $this->menuService->getId( $id );
		$products = $this->menuService->getProduct( $menu, $request );

		return view( 'menu', [
			'title'    => $menu->name,
			'products' => $products,
			'menu'     => '$menu',
		]);
	}
}
