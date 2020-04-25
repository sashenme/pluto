@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card success">
            <div class="card-header">
                <h3 class="card-title">Questions and Answers</h3>
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

                    @if($questions_sets->count() > 0)
                    <form action="{{$edit ? route('updateQuestions', $selectedQuestion->id) : route('questions.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Questions Set</label>
                            <select class="form-control" name="questions_set_id">

                                @foreach($questions_sets as $qSet)
                                <option value="{{$qSet->id}}">{{$qSet->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" name="title" id="question" placeholder="" value="{{$edit ? $selectedQuestion->title : old('title')}}">
                        </div>
                        <h3>Answers</h3>
                        <div class="answers">
                            @if($edit)
                            @foreach(App\Answer::where('question_id',$selectedQuestion->id)->get() as $answer)
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="hidden" name="id[]" value="{{$answer->id}}">
                                    <div class="form-group">
                                        <label for="answer[]">Answer 1</label>
                                        <input type="text" class="form-control" name="name[]" id="answer[]" placeholder="" value="{{$answer->name}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="reason[]">Answer 1 - Reason</label>
                                        <input type="text" class="form-control" name="reason[]" id="reason[]" placeholder="" value="{{$answer->reason}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="correct-1">&nbsp;</label>
                                        <div class="input-group">
                                            <select name="correct[]" id="" class="custom-select">
                                                <option value="0">❌</option>
                                                <option value="1" {{$answer->correct == 1 ? 'selected' : ''}}>✔️</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-danger answer-delete" data-form-action="{{action('AnswerController@destroy',$answer->id)}}" type="button">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="answer[]">Answer 1</label>
                                        <input type="text" class="form-control" name="name[]" id="answer[]" placeholder="" value="{{  old('answer[]')}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="reason[]">Answer 1 - Reason</label>
                                        <input type="text" class="form-control" name="reason[]" id="reason[]" placeholder="" value="{{ old('answer[]')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="correct-1">&nbsp;</label>
                                        <select name="correct[]" id="" class="form-control">
                                            <option value="0">❌</option>
                                            <option value="1">✔️</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="answer[]">Answer 2</label>
                                        <input type="text" class="form-control" name="name[]" id="answer[]" placeholder="" value="{{ old('answer[]')}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="reason[]">Answer 2 - Reason</label>
                                        <input type="text" class="form-control" name="reason[]" id="reason[]" placeholder="" value="{{ old('answer[]')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="correct-1">&nbsp;</label>

                                        <select name="correct[]" class="custom-select">
                                            <option value="0">❌</option>
                                            <option value="1">✔️</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <a href="#" id="addRow" class="btn btn-default float-right">Add New Answer</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @else
                    <h3>No questions set found.</h3>
                    <p> Please add a <a href="{{route('questions-sets.index')}}" class="">Questions Set</a> to add Questions and Answers</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Questions and Answers</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>
                    @foreach($questions as $question)
                    <tr>
                        <td> {{$question->id}}</td>
                        <td>
                            <h5> {{$question->title}}</h5>
                            <ol class="small">
                                @foreach(App\Answer::where('question_id',$question->id)->get() as $answer)
                                <li class="{{$answer->correct == 1 ? 'text-success' :''}}">{{$answer->name.' - '.$answer->reason}}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('questions.edit',$question->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $question->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>



            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<form class="delete-form" method="POST"> 
    {{csrf_field()}}
<input name="_method" type="hidden" value="DELETE">
</form>
@endsection
@section('scripts')
<script>
    $("#addRow").click(function() {
        addRow();
    });
    // var i = 21;


    var answerInc = 3;

    function addRow() {
        console.log("added a row");

        var row =
            '<div class="row">' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label for="answer[]">Answer ' + answerInc + '</label>' +
            ' <input type="text" class="form-control" name="name[]" id="answer[]" placeholder="" value="">' +
            '</div>' +
            ' </div>' +
            '<div class="col-md-7">' +
            '<div class="form-group">' +
            '<label for="reason[]">Reason ' + answerInc + '</label>' +
            '<input type="text" class="form-control" name="reason[]" id="reason[]" placeholder="" value="">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2"><div class="form-group"><label for="correct-1">&nbsp;</label>' +
            ' <div class="input-group">' +
            '<select name="correct[]" class="custom-select" id="inputGroupSelect04">' +
            '<option value="0">❌</option>' +
            '<option value="1">✔️</option>' +
            '</select>' +
            '<div class="input-group-append">' +
            '<button class="btn btn-outline-danger remove" type="button"><i class="fas fa-trash-alt"></i></button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('.answers').append(row);
        answerInc++;
        countRows();
    }

    $(document).on('click', ".remove", function() {
        countRows();
        var l = $('answers .row').length;
        if (l == 1) {
            alert('You cannot delete all rows');
        } else {
            console.log(l);
            $(this).parent().parent().parent().parent().parent().remove();
        }


    });


    countRows();


    function countRows() {
        var table = document.getElementsByClassName('answers')[0],
            rows = table.getElementsByClassName('.row'),
            text = 'textContent' in document ? 'textContent' : 'innerText';


        for (var i = 1, len = rows.length; i < len; i++) {
            rows[i].children[0][text] = i;
        }
        console.log(i);
    }

    $('.answer-delete').click(function() {
        var r = confirm("Are you sure want to delete this answer?");
        if (r == true) {
            formAction = $(this).attr('data-form-action'); 
            $(".delete-form").attr('action', formAction);
            $(".delete-form").submit();
        }  
    });
</script>
@endsection