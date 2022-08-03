<?php
namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SliderService {
	public function insert( $request ) {
		try {
			Slider::create( $request->input() );

			Session::flash( 'success', 'Thêm mới thành công' );
		} catch ( \Exception $err ) {
			Session::flash( 'error', 'Thêm slider lỗi' );
			Log::info( $err->getMessage() );

			return false;
		}

		return true;
	}

	public function get() {
		return Slider::orderByDesc( 'id' )->paginate( 15 );
	}

	public function update( $request, $slider ) {
		try {
			$slider->fill( $request->input() );
			$slider->save();

			Session::flash( 'success', 'Cập nhập thành công' );
		} catch ( \Exception $err ) {
			Session::flash( 'error', 'Cập nhập không thành công' );
			Log::info( $err->getMessage() );
			return false;
		}
		return true;
	}
}
