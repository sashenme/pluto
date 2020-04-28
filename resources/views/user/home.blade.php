@extends('layouts.user')

@section('content')
<div class="bg-wrap"></div>
<div class="container-fluid main-container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-white my-5"><span class="text-normal">Good Morning,</span> {{{ Auth::user()->first_name}}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="box shadow mb-3">
                <h3>
                    <span class="text-normal">Message from</span> CEO
                </h3>
                <div class="header-line"></div>
                <div class="row">

                    <div class="col-md-3 col-sm-4">
                        <img src="http://placehold.it/260x320" alt="" class="rounded img-fluid mb-3">
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                        </p>
                        <p>Aconsectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                        </p>
                        <p>
                            Eerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper sus </p>
                        <h6 class="text-right mt-5">Supun Weerasinghe</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-30">
        <div class="col-12">
            <h3 class="mt-5">Daily Ingesion</h3>
            <div class="header-line"></div>
        </div>
        <div class="col-md-8">
            <video controls class="embed-responsive embed-responsive-16by9 mb-4">
                <source src="http://35.193.46.164/videos/Pluto%20-%20Covid%2019-1.webm" type="video/webm">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="col-md-4 pl-30">
            @if ($questions_set->count() > 0)
            @foreach($questions_set as $qSet)
            <h3 class="text-primary text-medium mb-4">{{$qSet->title}}</h3>
            <p class="text-justify">{{$qSet->description}}</p>
            @endforeach


            @if($dailyQuiz)
            <a href="{{route('dailyQuiz')}}" class="btn btn-primary btn-block mt-5">Answer to Daily Quiz</a>
            @else
            @if(session()->has('status'))
            <div class="alert alert-{{session('status')}}">
                {{ session('message') }}
            </div>
            @endif
            <p>Good Job! You have answered all questions for today!

                {{$correctAnswers}}/2
            </p>
            @endif
            @else
            <p>No Daily Ingesions for today</p>
            @endif

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="box shadow mb-4">
                <div class="row">
                    <div class="col-8">
                        <h3 class=" ">Your Score</h3>
                        <div class="header-line"></div>
                    </div>
                    <div class="col-4">
                        <h3 class="float-right text-secondary">45</h3>
                    </div>
                </div>
                <table class="table table-borderless mb-0 mt-2">
                    <tr>
                        <td>Hand washing</td>
                        <td class="text-right">50</td>
                    </tr>
                    <tr>
                        <td>Hand washing</td>
                        <td class="text-right">50</td>
                    </tr>
                    <tr>
                        <td>Hand washing</td>
                        <td class="text-right">50</td>
                    </tr>
                    <tr>
                        <td>Hand washing</td>
                        <td class="text-right">50</td>
                    </tr>
                    <tr>
                        <td>Hand washing</td>
                        <td class="text-right">50</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box shadow">
                <h3>Leaderboard</h3>
                <div class="header-line"></div>
                <ol>
                    <li>Sashen Pasindu</li>
                    <li>Sashen Pasindu</li>
                    <li>Sashen Pasindu</li>
                    <li>Sashen Pasindu</li>
                    <li>Sashen Pasindu</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection