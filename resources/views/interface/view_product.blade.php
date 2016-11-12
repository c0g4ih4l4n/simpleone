@extends ('template.main')
@section ('content')
    <div class="container">
        <form id="search-form">
            <div class="dropdown" id="search-dropdown">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">All Category <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">First Item</a></li>
                    <li><a href="#">Second Item</a></li>
                    <li><a href="#">Third Item</a></li>
                </ul>
            </div>
            <input class="form-control" type="search" placeholder="Search Here" id="search-field">
            <button class="btn btn-warning" type="button"> <span class="glyphicon glyphicon-search"></span></button>
        </form>
        <div class="search-info">
            <h3>Category Name</h3><span class="info-order">Order By</span>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">First Item</a></li>
                    <li><a href="#">Second Item</a></li>
                    <li><a href="#">Third Item</a></li>
                </ul>
            </div>
        </div>

        
        <div class="row" id="result-search">
            <div class="col-md-3">
                <div class="thumbnail"><img src="{!! URL::asset('assets/img/images.png') !!}">
                    <div class="caption">
                        <h5>Thumbnail label</h5></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img src="{!! URL::asset('assets/img/images.png') !!}">
                    <div class="caption">
                        <h5>Thumbnail label</h5></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img src="{!! URL::asset('assets/img/images.png') !!}">
                    <div class="caption">
                        <h5>Thumbnail label</h5></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img src="{!! URL::asset('assets/img/images.png') !!}">
                    <div class="caption">
                        <h5>Thumbnail label</h5></div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination">
                <li><a aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li><a>1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
                <li><a>4</a></li>
                <li><a>5</a></li>
                <li><a aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    </div>
@endsection