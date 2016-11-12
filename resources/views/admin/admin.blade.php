@extends ('template.main')

@section ('content')
	<div class="col-md-8 col-md-offset-1">
		<h4>Admin Control Panel</h4>

		<a href="{!! URL::route('admin.categories.index') !!}" class="btn btn-default">Manager Category</a>
		
		<a href="{!! URL::route('admin.products.index') !!}" class="btn btn-default">Manager Product</a>

		<a href="{!! URL::route('admin.users.index') !!}" class="btn btn-default">Manager User</a>
		<a href="{!! URL::route('admin.users.index') !!}" class="btn btn-default">Manager Supplier</a>
		<a href="{!! URL::route('admin.users.index') !!}" class="btn btn-default">Manager Shipper</a>
	</div>
@endsection