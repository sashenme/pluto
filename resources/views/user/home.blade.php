@extends('layouts.admin')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-olive">
            <div class="card-header">
                <h3 class="card-title">CEO Message</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                @foreach($questions_set as $qSet)
                <h3>{{$qSet->title}}</h3>
                <p>{{$qSet->description}}</p>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Daily Ingesion</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <div class="media">
                    <div class="media-body" style="margin: 0 auto;">
                        <video class="col-lg-12" controls="true">
                            <source src="/videos/who-hygiene-reminder.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

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
                        <input class="custom-control-input" type="radio" id="answer-{{$answer->id}}" checked="false" name="answer_id" value="{{$answer->id}}">
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