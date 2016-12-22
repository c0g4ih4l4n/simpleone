<div class="form-search">
<form id="search-form" action="{{ URL::route('search') }}" method="GET">
    {{-- <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="category-dropdown">All <span class="caret"></span></button>
        <ul class="search-menu" role="menu">
            <li class="category-search"><a href="#">All Category </a></li>
        @foreach ($sort_categories as $category)
            <li class="category-search"><a href="#">{!! $category['category_name'] !!}</a></li>
        @endforeach
        </ul>
    </div> --}}
    <select name="search_cate" id="">
        <option value="0">All Category</option>

        @if (isset($search_cate))
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id == $search_cate) selected="selected" @endif>{!! $category->category_name !!}</option>
        @endforeach

        @else 

        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{!! $category->category_name !!}</option>
        @endforeach

        @endif

    </select>
    <input class="form-control" type="search" placeholder="Search Here" id="search-field" name="keyword" @if (isset($keyword)) value="{{ $keyword }}" @endif>
    <button class="btn btn-warning search-button" type="submit"><img class="search-icon" src="{{ URL::asset('img/search.png') }}" alt=""></button>
</form>
</div>