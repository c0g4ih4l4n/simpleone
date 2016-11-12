@extends ('template.main')
@section ('content')


<div class="col-md-6 col-md-offset-3">
    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('products::reviews.store', $id) }}">

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

        <h2 class="text-center">Review Product</h2>

        <div class="form-group">
            <label class="control-label" for="review_title">Title</label>
            <input class="form-control" type="text" name="review_title">
        </div>

        <div class="form-group">
            <label class="control-label" for="review_content">Description </label>
            <textarea class="form-control" name="review_content"></textarea>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Post </button>
            </div>
        </div>

    </form>
</div>

@endsection