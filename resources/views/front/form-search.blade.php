<div>
<form id="search-form" action="{{ URL::route('search') }}" method="GET">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="category-dropdown">All <span class="caret"></span></button>
        <ul class="search-menu" role="menu">
            <li class="category-search"><a href="#">All Category </a></li>
        @foreach ($sort_categories as $category)
            <li class="category-search"><a href="#">{!! $category['category_name'] !!}</a></li>
        @endforeach
        </ul>
    </div>
    <input class="form-control" type="search" placeholder="Search Here" id="search-field" name="keyword">
    <button class="btn btn-warning" type="submit"> <span class="glyphicon glyphicon-search"></span></button>
</form>
</div>
