@extends ('admin.template.main')

@section ('content')
@parent
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ URL::route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ $user->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <input name="user_level" class="form-control" type="text" value="{{ $user->user_level }}" >
                        </div>
                        <div class="form-group">
                            <label>User Balance</label>
                            <input name="user_balance" class="form-control" type="text" value="{{ $user->user_balance }}" >
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="photo">Avatar</label>
                            <input type="file" name="photo" id="file-input">
                        </div>
                        
                        <button type="submit" class="btn btn-default">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
