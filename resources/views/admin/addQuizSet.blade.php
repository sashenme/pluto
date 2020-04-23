@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-lg-4">
        <div class="card success">
            <div class="card-header">
                <h3 class="card-title">{{$edit ? 'Edit' : 'Add'}} Question Set</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
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
                    @if(!is_null(session('success')))
                    <div class="alert alert-success">
                        <p class="mb-0">{{session('success')}}</p>
                    </div>
                    @endif
                    <form action="{{$edit ? route('updateQuestionSets',$questions_set->id) : route('questions-sets.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{$edit ? $questions_set->title : old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="" value="{{$edit ? $questions_set->description :old('description')}}">
                        </div>
                        <div class="form-group">
                            <label for="schedule_date">Schedule Ddate</label>
                            <input type="date" class="form-control" name="schedule_date" id="schedule_date" placeholder="" value="{{$edit ? $questions_set->schedule_date :old('schedule_date')}}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Question Sets</h3>

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
                    <th>Title</th>
                    <th width="40%">Description</th>
                    <th>Schedule Date</th>
                    <th>Quetions</th>
                    <th>Action</th>

                    @foreach ($questions_sets as $key => $qSet)
                    <tr>
                        <td>{{ $qSet->id}}</td>
                        <td>{{ $qSet->title }}</td>
                        <td>{{ $qSet->description }}</td>
                        <td>{{ $qSet->schedule_date }}</td>
                        <td>2 Questions <br> <a href="#" class="badge badge-success">Add more</a></td>
                        <td>

                            <a class="btn btn-primary btn-sm" href="{{ route('questions-sets.edit',$qSet->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['questions-sets.destroy', $qSet->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $questions_sets->render() !!}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>


@endsection