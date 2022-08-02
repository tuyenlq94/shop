@extends('admin.main')
@section('head')
	<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
	<div class="card-body">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="product">Tên Sản phẩm</label>
					<input type="text" name="name" class="form-control" placeholder="Nhập tên Sản phẩm">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Danh mục </label>
					<select class="form-control" name="parent_id" id="">
						<option value="0">Danh mục cha</option>
						@foreach ( $menus as $menu )
							<option value="{{$menu->id}}">{{$menu->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Giá gốc</label>
					<input type="number" name="price" class="form-control" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Giá giảm</label>
					<input type="number" name="price" class="form-control">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label>Mô tả ngắn</label>
			<textarea name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label>Mô tả chi tiết</label>
			<textarea name="content" id="content" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label>Ảnh sản phẩm</label>
			<input type="file" name="file" class="form-control" id="upload">
			<div id="image_show"></div>
			<input type="hidden" name="thumb" id="thumb">
		</div>

		<div class="form-group">
			<label>Kích hoạt</label>
			<div class="custom-control custom-radio">
				<input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
				<label for="active" class="custom-control-label">Có</label>
			</div>
			<div class="custom-control custom-radio">
				<input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
				<label for="no_active" class="custom-control-label">Không</label>
			</div>

		</div>
	</div>

	<div class="card-footer">
	  <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
	</div>
	@csrf
  </form>
@endsection

@section('footer')
	<script>
		CKEDITOR.replace( 'content' )
	</script>
@endsection