@extends('layouts.admin')

@section('content')


<div class="row clearfix">
    <div class="col-lg-5">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Add New User</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('users.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" value="{{old('first_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="" value="{{old('last_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" class="form-control" name="employee_id" id="employee_id" placeholder="" value="{{old('employee_id')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="" value="{{old('confirm_password')}}">
                    </div>
                    <div class="form-group">
                        <label for="roles">Role</label>
                        <select class="form-control" name="roles" id="roles">
                            <option value="user" {{old('roles') == 'user' ? 'selected' : ''}}>User</option>
                            <option value="admin" {{old('roles') == 'admin' ? 'selected' : ''}}>Admin</option>
                        </select>
                    </div>



                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <table class="table">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Employee ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->employee_id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $users->render() !!}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>


@endsection