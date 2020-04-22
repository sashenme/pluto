@extends('layouts.admin')

@section('content')


<div class="clearfix">
        <div class="col-lg-4">
                <div class="card success">
                    <div class="card-header">
                      <h3 class="card-title">Add Question Set</h3>
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

                            <form action="{{route('questionssets.store')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="" value="{{old('description')}}">
                                </div>
                                <div class="form-group">
                                    <label for="schedule_date">Schedule Ddate</label>
                                    <input type="date" class="form-control" name="schedule_date" id="schedule_date" placeholder="" value="{{old('schedule_date')}}">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <div class="float-right">

    </div>
</div>


@endsection
