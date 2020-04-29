@extends('layouts.user')

@section('content')
<div class="bg-wrap-top">
    <div class="container-fluid main-container d-flex justify-content-between">
        <div>
            <h3 class="mb-0">Daily Quiz</h3>
            <h1 class="mb-0"> @foreach($questions_set as $qset){{$qset->title}}@endforeach</h1>
        </div>
        <h1 class="mt-3">{{$questions->id}}</h1>
    </div>
</div>
<div class="container-fluid main-container">
    
    <div id="daily-quiz-status" class="alert alert-{{session('status')}}" @if(!session()->has('status')) style="display:none;" @endif >
        {{ session('message') }}
    </div>

    <form id="daily-quiz-form" action="{{route('responses.store')}}" method="POST" data-next-action="{{route('dailyQuiz.question.next')}}">

        <input type="hidden" name="question_id" value="{{$questions->id}}">
        <?php $answers = App\Answer::where('question_id', $questions->id)->get() ?>

        <h2 id="daily-quiz-question" class="text-center my-5">{{$questions->title}}</h2>
        <div id="daily-quiz-answers" class="answers text-center">
            @foreach($answers as $answer)
            <input class="" type="radio" id="answer-{{$answer->id}}" name="answer_id" value="{{$answer->id}}">

            <label class="answer" for="answer-{{$answer->id}}">{{$answer->name}}</label>
            @endforeach
        </div>
        {{csrf_field()}}


        <button type="submit" class="btn btn-primary text-center d-block mx-auto mt-5" disabled>Submit</button>
    </form>
</div>
@endsection