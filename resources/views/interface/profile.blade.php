@extends ('template.main')
@section ('content')
    <h3 id="title-user-infomation">Account Information</h3>
    <div class="container" id="user-info-container">

        <div class="profile-picture col-md-3">
            @if ($user_show->avatar == null)
            <img src="{!! URL::asset('assets/img/default.png') !!}" class="img-responsive">
            @else 
            <img src="{{ URL::route('get_photo', $user_show->avatar) }}" class="img-responsive">
            @endif
        </div>

        <div class="user-info">
            <h4>{{ $user_show->name }} Profile</h4>
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>User Name</td>
                            <td>{!! $user_show->name !!}</td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td>{!! $user_show->email !!}</td>
                        </tr>
                        <tr>
                            <td>Password </td>
                            <td>****** </td>
                        </tr>
                        <tr>
                            <td>User Balance </td>
                            <td>{!! $user->user_balance !!} $</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="btn-group" role="group">
        @if ($user->id == $user_show->id || $user->user_level > 0) 
            <a href="{!! URL::route('users.edit', $user_show->id) !!}"><button class="btn btn-primary" type="button" id="save-change">Edit Profile</button></a>
        @endif
        </div>
    </div>
@endsection