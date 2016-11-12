@extends ('template.main')
@section ('content')
<div class="wrap" style="margin-left: 40px;">
	<h3>{!! $category['category_name'] !!}
		@if ($user['user_level'] > 0)
		<a href="{!! URL::route('admin.categories.edit', $category['id']) !!}">Edit</a>
		@endif
	</h3>
	<h4>Number of Products: {!! $category['number_of_products'] !!}</h4>
	<p>Description: {!! $category['category_description'] !!}</p>
	<div>
		<h5>Popular Products</h5>
		<ul>
			@if (count($popular_products)) 
				@foreach ($popular_products as $product)
					<li><a href="{!! URL::route('products.show', $product->id) !!}">{!! $product['product_name'] !!}</a></li>
				@endforeach
			@endif
		</ul>
	</div>
</div>

@endsection