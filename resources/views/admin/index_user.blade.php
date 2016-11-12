@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('admin') }}"><span>Admin Control Panel</span></a></li>
        <li class="active"><span>Manage User</span></li>
    </ol>
    <div class="container" id="user-info-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>User Name</th>
                        <th>Email </th>
                        <th>Address </th>
                        <th>Detail </th>
                        <th>Edit </th>
                        <th>Delete </th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 0 ?>
                @foreach ($users_all as $user_show)
                <?php $num++; ?>
                    <tr>
                        <td>{!! $num !!}</td>
                        <td>{!! $user_show->name !!}</td>
                        <td>{!! $user_show->email !!}</td>
                        <td>Viet Nam</td>
                        <td><a href="{!! URL::route('users.show', $user_show->id) !!}">Detail </a></td>
                        <td><a href="{!! URL::route('admin.users.edit', $user_show->id) !!}">Edit </a></td>
                        <td>
                        <form method="POST" action="{{ route('admin.users.destroy', $user_show->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $user_show->id }}">
                            <button type='submit' class="btn btn-link">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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