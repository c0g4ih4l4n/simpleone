@extends ('template.main')
@section ('content')

<div class="col-md-6 col-md-offset-3" id="add-category">
    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('admin.categories.update', $category['id']) }}" enctype="multipart/form-data">
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
        <h2 class="text-center">Edit Category {!! $category['category_name'] !!}</h2>
        <div class="form-group">
            <label class="control-label" for="category_name">Category Name</label>
            <input class="form-control" type="text" name="category_name" 
            value="@if(isset($old)){!!$old['category_name']!!}@else{!!$category['category_name']!!}@endif">
        </div>

        <div class="form-group">
            <label class="control-label" for="category_description">Description </label>
            <textarea class="form-control" name="category_description" >@if (isset($old)){!! $old['category_description'] !!}@else{!! $category['category_description'] !!}@endif</textarea>
        </div>

        <div class="form-group">
            <label class="control-label" for="order_number">Order Number</label>
            <input class="form-control" type="text" name="order_number" 
            value="@if(isset($old)){!!$old['order_number']!!}@else{!!$category['order_number']!!}@endif">
        </div>

        <div class="form-group">
            <label class="control-label" for="photo">Category Image</label>
            <input type="file" name="photo" id="file-input">
        </div>
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Edit </button>
            </div>
        </div>
    </form>
</div>

@endsection