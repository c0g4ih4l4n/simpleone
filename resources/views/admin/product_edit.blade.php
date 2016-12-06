@extends ('admin.template.main')

@section ('content')
@parent
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('admin.products.update', $product->id) }}">
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
                        <div class="form-group">
                            <label class="control-label" for="product_name">Product Name</label>
                            <input class="form-control" type="text" name="product_name" placeholder="Please Enter Product Name" value="{{ $product->product_name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="category_name">Category Name</label>
                            <input class="form-control" type="text" name="category_name" placeholder="Please Enter Product Name" value="{{ $product->category_name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="color">Color </label>
                            <input class="form-control" type="text" name="color" placeholder="Please Enter Product Name" value="{{ $product->color }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price </label>
                            <input class="form-control" type="text" name="price" placeholder="Please Enter Product Name" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantity </label>
                            <input class="form-control" type="text" name="quantity" placeholder="Please Enter Product Name" value="{{ $product->quantity }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="supplier_name">Supplier </label>
                            <input class="form-control" type="text" name="supplier_name" placeholder="Please Enter Product Name" value="{{ $product->supplier_name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="product_description">Description </label>
                            <textarea class="form-control" name="product_description">{{ $product->product_description }}</textarea>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label class="control-label" for="product_image">Product Image</label>
                            <input type="file" name="product_image">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-default" type="submit">Add</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
