@extends ('admin.template.main')

@section ('content')
@parent
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Balance</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users_all as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->user_level }}</td>
                            <td>{{ $user->user_balance }}</td>
                            <td>{{ $user->email }}</td>
                            <td><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.users.edit', $user->id) !!}">Edit </a></td>
                            <td>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type='submit' class="btn btn-link"><i class="fa fa-trash-o  fa-fw"></i>Delete</button>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
