<form id="search-form" action="">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="category-dropdown">All <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li class="category-search"><a href="#">All Category </a></li>
        @foreach ($sort_categories as $category)
            <li class="category-search"><a href="#">{!! $category['category_name'] !!}</a></li>
        @endforeach
        </ul>
    </div>
    <input class="form-control" type="search" placeholder="Search Here" id="search-field">
    <button class="btn btn-warning" type="button"> <span class="glyphicon glyphicon-search"></span></button>
</form>
