@extends ('admin.template.main')

@section ('content')
@parent
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Parent</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>None</td>
                            <td>Hiện</td>

                            <td><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.categories.edit', $category['id']) !!}">Edit </a></td>
                            <td>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category['id']) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{ $category['id'] }}">
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
@stop