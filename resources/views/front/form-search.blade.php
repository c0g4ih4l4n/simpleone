<div class="form-search">
<form id="search-form" action="{{ URL::route('search') }}" method="GET">
    {{ csrf_field() }}
    {{-- <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="category-dropdown">All <span class="caret"></span></button>
        <ul class="search-menu" role="menu">
            <li class="category-search"><a href="#">All Category </a></li>
        @foreach ($sort_categories as $category)
            <li class="category-search"><a href="#">{!! $category['category_name'] !!}</a></li>
        @endforeach
        </ul>
    </div> --}}
    <select name="search-menu" id="">
        <option value="0">All Category</option>

        @foreach ($sort_categories as $category)
            <option value="{{ $category['id'] }}">{!! $category['category_name'] !!}</option>
        @endforeach
        
    </select>
    <input class="form-control" type="search" placeholder="Search Here" id="search-field" name="keyword">
    <button class="btn btn-warning search-button" type="submit"><img class="search-icon" src="{{ URL::asset('img/search.png') }}" alt=""></button>
</form>
</div>