@extends ('template.main')
@section ('content')
<div class="col-md-6 col-md-offset-3">
    <form class="bootstrap-form-with-validation" role="form" method="POST" action="{{ URL::route('users.update', $user_target->id) }}" enctype="multipart/form-data">
        {{ method_field('PUT')}}
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
        <h2 class="text-center">Edit User {!! $user_target->name !!}</h2>

        {{-- User Name --}}
        <div class="form-group">
            <label class="control-label" for="user_name">User Name</label>
            <input class="form-control" type="text" name="user_name" 
            value="@if(isset($old)){!!$old->name!!}@else{!!$user_target->name!!}@endif">
        </div>
        
        {{-- Email --}}
        <div class="form-group">
            <label class="control-label" for="email">Email </label>
            <input class="form-control" type="text" name="user_name" 
            value="@if(isset($old)){!!$old->email!!}@else{!!$user_target->email!!}@endif" disabled="disabled">
        </div>


        {{-- Password --}}
		@if ($user_target->id == $user->id)
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
			<div class="clearfix"></div>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" disabled="disabled" value="******">


                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <a href="{!! URL::route('change_pass', $user_target->id) !!}">
            	Change Password
			</a>
        </div>
		@endif

        <div class="clearfix"></div>

        {{-- Avatar --}}
        <div class="form-group">
            <label class="control-label" for="photo">Avatar</label>
            <input type="file" name="photo" id="file-input">
        </div>

        {{-- Submit --}}
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </div>
    </form>
</div>

@endsection