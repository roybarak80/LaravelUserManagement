@extends('main')

@section('content')


        <div class="row form-group">
            <div class="col-md-12">
                {!! Form::open(array('url' => '/save_user', 'id' => 'new-user-form', 'role' =>'form')) !!}
               
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>User Type</label>
                    <select name="user_type" class="form-control">
                        <option value="Live">Live</option>
                        <option value="Demo">Demo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button  id="saveUser"
                        class="btn btn-success pull-left ">Save</button>
                    <button type="button" id="cancelSave"
                        class="btn btn-danger pull-right ">Cancel</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
     
@endsection