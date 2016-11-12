@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('admin') }}"><span>Admin Control Panel</span></a></li>
        <li class="active"><span>Manage Category</span></li>
    </ol>
    <div class="container" id="user-info-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Number of Product</th>
                        @if (!empty($user) && $user['user_level'] >0)
                        <th>Edit </th>
                        <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                <?php $num = 0; ?>
                @foreach ($categories as $category)
                <?php $num ++; ?>
                    <tr>
                        <td>{!! $num !!}</td>
                        <td><a href="{!! URL::route('categories.show', $category['id']) !!}">{!! $category['category_name'] !!}</a></td>
                        <td>{!! $category['number_of_products'] !!}</td>
                        @if (!empty($user) && $user['user_level'] >0)
                        <td><a href="{!! URL::route('admin.categories.edit', $category['id']) !!}">Edit </a></td>
                        <td>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category['id']) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button type='submit' class="btn btn-link">Delete</button>
                        </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{!! URL::route('admin.categories.create') !!}">Create New Category</a>
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