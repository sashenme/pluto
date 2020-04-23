@extends('layouts.admin')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Daily Questions</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
            @if(session()->has('status'))
            <div class="alert alert-{{session('status')}}">
            {{ session('message') }}
            </div>
            @endif
                <form action="{{route('responses.store')}}" method="POST">
                {{csrf_field()}}
                    
                    <h5>{{$questions->title}}</h5>
                    <input type="hidden" name="question_id" value="{{$questions->id}}">
                    <?php $answers = App\Answer::where('question_id', $questions->id)->get() ?>
                    @foreach($answers as $answer)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="radio" id="answer-{{$answer->id}}" name="answer_id" value="{{$answer->id}}">
                        <label for="answer-{{$answer->id}}" class="custom-control-label">{{$answer->name}}</label>
                    </div>
                    @endforeach

                   
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection