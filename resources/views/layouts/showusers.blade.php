@extends('main')

@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="row form-group">
            <div class="col-md-12 header-title">
                <span class="header-label">Live Users</h4>
            </div>
        </div>
        @foreach($userDetails as $row)

        @if ($row['user_type']==="Live")

        <div class="row form-group">
            <div class="col-md-12">
                {!! Form::open(array('url' => '/saveUserData', 'class' => 'subscribe-form', 'role' =>'form')) !!}
                <h5>{{$row['first_name']}} {{$row['last_name']}} | {{$row['user_id']}}</h5>
                <input type="text" name="user_id_{{$row['user_id']}}" class="userid" value="{{$row['user_id']}}" hidden>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email_{{$row['user_id']}}" class="useremail form-control"
                        value="{{$row['email']}}">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name_{{$row['user_id']}}" class="firstname form-control"
                        value="{{$row['first_name']}}">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="last_name_{{$row['user_id']}}" class="lastname form-control"
                        value="{{$row['last_name']}}">
                </div>
                <div class="form-group card-digits-wrapper_{{$row['user_id']}}">
                    <label>Card Last Digits</label>
                    <input type="text" name="credit_card_last_digits_{{$row['user_id']}}" class="form-control"
                        value="{{$row['credit_card_last_digits']}}">
                </div>
                <div class="form-group demo-date-wrapper_{{$row['user_id']}}">
                    <label>demo_expiration_date</label>
                    <input type="text" name="datepicker_{{$row['user_id']}}" class="expirationdate form-control"
                        id="datepicker_{{$row['user_id']}}" value="{{$row['demo_expiration_date']}}">
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <select name="user_type_{{$row['user_id']}}" class="usertype form-control">
                        <option {{old('user_type',$row['user_type'])=="Live"? 'selected':''}} value="Live">Live</option>
                        <option {{old('user_type',$row['user_type'])=="Demo"? 'selected':''}} value="Demo">Demo</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="button" value="Save" id="submit_{{$row['user_id']}}"
                        class="btn btn-success pull-left ">
                    <input type="button" value="Delete" id="delete_{{$row['user_id']}}"
                        class="btn btn-danger pull-right ">
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        @endif

        @endforeach
    </div>
    <div class="col-md-6">
        <div class="row form-group">
            <div class="col-md-12 header-title">
                <span class="header-label">Demo Users</h4>
            </div>
        </div>

        @foreach($userDetails as $row)

        @if ($row['user_type']==="Demo")
        <div class="row form-group">
            <div class="col-md-12">
                {!! Form::open(array('url' => '/saveUserData', 'class' => 'subscribe-form', 'role' =>'form')) !!}

                <h5>{{$row['first_name']}} {{$row['last_name']}} | {{$row['user_id']}}</h5>
                <input type="text" name="user_id_{{$row['user_id']}}" class="userid" value="{{$row['user_id']}}" hidden>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email_{{$row['user_id']}}" class="useremail form-control"
                        value="{{$row['email']}}">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name_{{$row['user_id']}}" class="firstname form-control"
                        value="{{$row['first_name']}}">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name_{{$row['user_id']}}" class="lastname form-control"
                        value="{{$row['last_name']}}">
                </div>
                <div class="form-group card-digits-wrapper_{{$row['user_id']}}">
                    <label>Card Last Digits</label>
                    <input type="text" name="credit_card_last_digits_{{$row['user_id']}}" class="form-control"
                        value="{{$row['credit_card_last_digits']}}">
                </div>
                <div class="form-group demo-date-wrapper_{{$row['user_id']}}">
                    <label>demo_expiration_date</label>
                    <input type="text" name="datepicker_{{$row['user_id']}}" class="expirationdate form-control"
                        id="datepicker_{{$row['user_id']}}" value="{{$row['demo_expiration_date']}}">
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <select name="user_type_{{$row['user_id']}}" class="usertype form-control">
                        <option {{old('user_type',$row['user_type'])=="Live"? 'selected':''}} value="Live">Live</option>
                        <option {{old('user_type',$row['user_type'])=="Demo"? 'selected':''}} value="Demo">Demo</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="button" value="Save" id="submit_{{$row['user_id']}}"
                        class="btn btn-success pull-left ">
                    <input type="button" value="Delete" id="delete_{{$row['user_id']}}"
                        class="btn btn-danger pull-right ">
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        @endif

        @endforeach
    </div>

</div>
</div>
@endsection
