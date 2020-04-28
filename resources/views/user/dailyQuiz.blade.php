@extends('layouts.user')

@section('content')
<div class="bg-wrap-top">
    <div class="container-fluid main-container d-flex justify-content-between">
        <div>
            <h3 class="mb-0">Daily Quiz</h3>
            <h1 class="mb-0">Hand Washing</h1>
        </div>
        <h1 class="mt-3">01</h1>
    </div>
</div>
<div class="container-fluid main-container">
    @if(session()->has('status'))
    <div class="alert alert-{{session('status')}}">
        {{ session('message') }}
    </div>
    @endif

    <form action="{{route('responses.store')}}" method="POST">

        <input type="hidden" name="question_id" value="{{$questions->id}}">
        <?php $answers = App\Answer::where('question_id', $questions->id)->get() ?>

        <h2 class="text-center my-5">{{$questions->title}}</h2>
        <div class="answers text-center">
            @foreach($answers as $answer)
            <input class="" type="radio" id="answer-{{$answer->id}}" name="answer_id" value="{{$answer->id}}">
            <!-- <label class="custom-control-label"></label> -->
            <label class="answer" for="answer-{{$answer->id}}">{{$answer->name}}</label>
            @endforeach
        </div>
        {{csrf_field()}}


        <button type="submit" class="btn btn-primary text-center d-block mx-auto mt-5">Submit</button>
    </form>
</div>
@endsection