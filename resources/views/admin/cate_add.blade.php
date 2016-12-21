@extends ('admin.template.main')

@section ('content')
@parent
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                <div class="col-lg-7" style="padding-bottom:120px">
                <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('admin.categories.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control">
                                <option value="0">Please Choose Category</option>
                                @foreach ($categories as $category) 
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="category_name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="form-group">
                            <label>Category Order</label>
                            <input class="form-control" name="category_order" placeholder="Please Enter Category Order" />
                        </div>
                        <div class="form-group">
                            <label>Category Keywords</label>
                            <input class="form-control" name="category_keyword" placeholder="Please Enter Category Keywords" />
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea class="form-control" rows="3" name="category_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category Status</label>
                            <label class="radio-inline">
                                <input name="category_status" value="1" checked="" type="radio">Visible
                            </label>
                            <label class="radio-inline">
                                <input name="category_status" value="2" type="radio">Invisible
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="photo">Image</label>
                            <input type="file" name="category_image" id="file-input">
                        </div>
                        <button type="submit" class="btn btn-default">Category Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
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
