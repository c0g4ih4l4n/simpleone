@extends ('template.main')
@section ('content')
<div class="col-md-6 col-md-offset-3">
    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('update_pass', $id) }}">
        {{ csrf_field() }}
        @if (isset($message))
            <div class="alert alert-success">
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center">Change Password</h2>

        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <div class="">
                <input id="password" type="password" class="form-control" name="password">


                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="new_password" class="control-label">New Password</label>
            <div class="">
                <input type="password" class="form-control" name="new_password">


                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password" class="control-label">Retype New Password</label>
            <div class="">
                <input type="password" class="form-control" name="confirm_password">


                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
</div>	
	
@endsection