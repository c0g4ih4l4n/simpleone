@extends ('template.main')
@section ('content')

    <div class="container" id="user-info-container">
        <div class="col-md-6 col-md-offset-3" id="add-category">
            <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('admin.products.update', $product['id']) }}" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            @if (isset($message))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h2 class="text-center">Edit Product</h2>
                <div class="form-group">
                    <label class="control-label" for="product_name">Product Name</label>
                    <input class="form-control" type="text" name="product_name" value="{{ old('product_name', $product['product_name'])}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="category_name">Category Name</label>
                    <input class="form-control" type="text" name="category_name" value="{{ old('category_name', $product['category_name'])}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="color">Color </label>
                    <input class="form-control" type="text" name="color" value="{{ old('color', $product['color'])}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="price">Price </label>
                    <input class="form-control" type="text" name="price" value="{{ old('price', $product['price']) }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="quantity">Quantity </label>
                    <input class="form-control" type="text" name="quantity" value="{{ old('quantity', $product['quantity']) }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="supplier_name">Supplier </label>
                    <input class="form-control" type="text" name="supplier_name" value="{{ old('supplier_name', $product['supplier_name']) }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="product_description">Description </label>
                    <textarea class="form-control" name="product_description">{{ old('product_description', $product['product_description']) }}</textarea>
                </div>
                <div class="form-group"></div>
                <div class="form-group">
                    <label class="control-label" for="photo">Product Image</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Edit Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection