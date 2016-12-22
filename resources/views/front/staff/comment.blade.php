<div class="comment">
    <h1 class="heading1"><span class="maintext">Comments</span><span class="subtext"> Related Comments</span></h1>

    @foreach ($comments as $comment)
    <div class="media">
        <div class="media-body">
            <h5 class="media-heading">{!! $comment->user_name !!}</h5>
            <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
            <p>{!! $comment->content !!} </p>
            <p><span class="comment-date">{{ $comment->created_at->format('d M Y') }}</span></p>
        </div>
    </div>

    @endforeach


    <div class="page-header">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul></div>
    @endif

        <div class="media">

            <div class="media-body">
                <h2 class="heading1"><span class="maintext">Leave A Comment</span></h2>
                <form action="{!! URL::route('products::comments.store', $product->id) !!}" method="post">
                    {{ csrf_field() }}
                    <textarea name="content" class="ckeditor" id="comment" cols="30" rows="10"></textarea>
                    
                    <button type="submit" class="btn btn-primary center-block">Leave </button>
                </form>
            </div>
        </div>
    </div>
</div>