@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a><span>Home</span></a></li>
        <li><a><span>Library</span></a></li>
        <li><a><span>Data</span></a></li>
    </ol>
    <div class="col-lg-11 col-lg-offset-1 col-md-12">
        <h2 id="title-user-infomation">{!! $review->title !!}</h2>
        <div class="row" id="tag">
            <div class="col-md-12"><span>Tag: </span><span class="label label-info" id="tag-label-review"><span class="glyphicon glyphicon-tag" id="icon-tag"></span>Tag</span><span class="label label-info" id="tag-label-review"><span class="glyphicon glyphicon-tag" id="icon-tag"></span>Tag</span>
                <span
                class="label label-info" id="tag-label-review"><span class="glyphicon glyphicon-tag" id="icon-tag"></span>Tag</span>
            </div>
        </div>
        <div class="row review-main">
            <div class="col-md-8">
                <p>{!! $review->content !!}</p>
            </div>
            <div class="col-md-3"><img class="img-responsive" src="{{ URL::asset('assets/img/suit_jacket.jpg') }}"></div>
            <div class="col-md-12">
                <div id="vote-review">
                    <h4>Your Vote:<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></h4>
                    <h4>Avg. Rate: <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></h4></div>
            </div>
        </div>

        
        <div class="page-header">
            <h3>Comment</h3>
        </div>

        @foreach ($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h5 class="media-heading">{!! $comment->user_name !!}</h5>
                <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                <p>{!! $comment->content !!}</p>
                <p><span class="comment-date">{!! $comment->created_at->format('d M Y H:i:s') !!}</span></p>
            </div>
        </div>

        @endforeach

        <div class="page-header">
            <div class="media">
                <div class="media-body">
                    <h3 class="media-heading">Leave A Comment</h3>
                    <form action="{!! URL::route('products::reviews::comments.store', ['id' => $product->id, 'review_id' => $review->id]) !!}" method="post">
                        {{ csrf_field() }}
                        <textarea name="content" class="ckeditor" id="comment" cols="30" rows="10"></textarea>
                        
                        <button type="submit" class="btn btn-primary center-block">Leave </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection