<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Self Assessment Online</title>
    <meta name="description" content="Use this self-assessment tool to help determine whether you need be tested for COVID-19.">
    <meta property="og:title" content="COVID-19 Self Assessment Tool Online" />
    <meta property="og:description " content="Use this self-assessment tool to help determine whether you need be tested for COVID-19" />
    <meta property="og:image" content="https://covidselfcheck.com/img/og-image.jpg" />
    <meta name="twitter:image" content="https://covidselfcheck.com/img/og-image-twitter.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('covid/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/jquery-ui-git.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('covid/css/main.css')}}">
    <style>
        .loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: #1f4e8bef;
        }

        .lds-ellipsis {
            display: inline-block;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 80px;
            height: 80px;
        }

        .lds-ellipsis div {
            position: absolute;
            top: 33px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #fff;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }
    </style>
</head>


<body ng-app="at">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ97LJ2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="loading">
        <div class="language-check">
            <ul class="ng-scope " ng-controller="Ctrl"

                <li class="nav-item">
                    <a class="ng-scope language-btn btn-sinhala" ng-click="changeLanguage('lk')" id="" data-lang="btn-sinhala" data-language="si">සිංහල</a>
                </li>
                <li class="nav-item">
                    <a class="ng-scope language-btn btn-tamil" ng-click="changeLanguage('ta')" id="" data-lang="btn-tamil" data-language="ta">தமிழ்</a>
                </li>
                <li class="nav-item active">
                    <a class="ng-scope language-btn btn-english" ng-click="changeLanguage('en')" id="" data-lang="btn-english" data-language="en">English <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <nav class="ng-scope navbar navbar-expand-lg navbar-dark main-container" ng-controller="Ctrl">
        <a class="navbar-brand" href="./home">
            <img src="{{asset('img/logo-300-white.png')}}" alt="ata" width="120">
        </a>
        <ul class="navbar-nav justify-content-center" id="language">

            <li class="nav-item">
                <a class="ng-scope nav-link language-btn btn-sinhala" ng-click="changeLanguage('lk')" id="btn-sinhala" data-language="si">සිංහල</a>
            </li>
            <li class="nav-item">
                <a class="ng-scope nav-link language-btn btn-tamil" ng-click="changeLanguage('ta')" id="btn-tamil" data-language="ta">தமிழ்</a>
            </li>
            <li class="nav-item active">
                <a class="ng-scope nav-link language-btn btn-english" ng-click="changeLanguage('en')" id="btn-english" data-language="en">English <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-none">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="bg">
        <div class="bg-wrap">
            <div class="img-layer"></div>
        </div>
        <div class="bg-solid"></div>
    </div>
    <div class=" container-fluid main-container">
        <div class="row">
            <div class="col-lg-12">
                <h5 translate="TITLE" class="ng-scope text-center text-white">Answer these questions and check your
                    health status for coronavirus.
                </h5>
                <div class="form-group d-none">
                    <form method="POST" id="insert_form">
                        {{csrf_field()}}
                        <input type="text" id="txt-language" name="txt-language">
                        <input type="text" id="txt-q0" name="txt-q0">
                        <input type="text" id="txt-q1" name="txt-q1">
                        <input type="text" id="txt-q2" name="txt-q2">
                        <input type="text" id="txt-q3" name="txt-q3">
                        <input type="text" id="txt-q4" name="txt-q4">
                        <input type="text" id="txt-q5" name="txt-q5">
                        <input type="text" id="txt-q6" name="txt-q6">
                        <input type="text" id="txt-q7" name="txt-q7">
                        <input type="text" id="txt-q8" name="txt-q8">
                        <input type="text" id="txt-recommendation" name="txt-recommendation">
                        <button id="submit-btn"></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">


                <div class="card shadow questions">
                    <img src="" alt="" class="icon" id="q-icon">
                    <h1 class="text-center" id="q-title"></h1>
                    <p class="text-center" id="q-subtitle"></p>
                    <ul id="q-list"></ul>
                </div>


                <div class="card shadow recommendation" id="rec-1">
                    <div class="risk-meter mb-5">
                        <span translate="highRisk" class="float-left">High Risk</span>
                        <span translate="safe" class="float-right">Safe</span>
                        <div class="risk-level "></div>
                        <div class="risk-mark"></div>
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <img src="{{asset('covid/img/icon-0-info.png')}}" alt="" class="icon icon-info">
                    <h1 class="text-center " translate="notTestTitle">You don’t need to be tested</h1>
                    <h4 class="mt-3" translate="rec1H1">Since you don’t have any symptoms for COVID-19 you do not need
                        to be tested. But, you should Self-Quarantine.</h4>
                    <a translate="readGuide" href="#guide" class="text-primary text-center">Read our easy Self -
                        Quarantine Guide</a>
                    <p translate="rec1P1">
                        Testing is currently focused on individuals who have traveled outside Sri Lanka or had contact
                        with someone diagnosed as having COVID-19, or have developed symptoms of COVID-19.
                    </p>
                    <p translate="rec1P2">However, there’s a chance you could get sick since you said you have been
                        exposed
                    </p>
                    <ul>
                        <li translate="dontVisitHospital">Please do not visit a hospital, physician’s office, lab or
                            healthcare facility without
                            consulting <a href='tel:1390'>1390</a> or your district MOH office.
                        </li>
                        <li translate="dontGoPublic">Don't go to any public places, stay at home, and don’t have any
                            visitors.</li>
                        <li translate="dontSharePersonal">
                            Don’t share personal items like dishes, cups, or towels and wash your hands often.</li>
                        <li translate="ifYouDoDevelopFever">
                            If you do develop any Fever or Dry Cough or Difficulty in Breathing, take this
                            self-assessment again or Call <a href='tel:1390'>1390</a> or your district MOH office
                            immediately.</li>
                    </ul>
                    <p translate="rec1P4">
                        If you are experiencing other symptoms like Tiredness, Aches and Pains, Nasal Congestion, Runny
                        Nose, Sore Throat, Diarrhoea and want assessment contact: <a href='tel:1390'>1390</a> or your
                        district MOH Office immediately </p>
                        <a class="text-center btn-success btn-lg btn" href="./home" translate="goHome">Go Back</a>
                    <a class="text-center btn-primary btn-lg btn" href="{{route('covidSelfCheck')}}" translate="startOver">Start
                        Over!</a>
                </div>
                <div class="card shadow recommendation" id="rec-2">
                    <div class="risk-meter mb-5">
                        <span translate="highRisk" class="float-left">High Risk</span>
                        <span translate="safe" class="float-right">Safe</span>
                        <div class="risk-level "></div>
                        <div class="risk-mark"></div>
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <img src="{{asset('covid/img/icon-0-warning.png')}}" alt="" class="icon icon-warning">
                    <h1 class="text-center " translate="rec2H1">You will need to Self-Quarantine</h1>

                    <a translate="readGuide" href="#guide" class="text-primary text-center">Read our easy Self -
                        Quarantine Guide</a>
                    <p translate="BecauseYouHaveSymtoms">
                        Because you have some symptoms, you need to self-quarantine.
                    </p>
                    <ul>
                        <li translate="dontVisitHospital">Please do not visit a hospital, physician’s office, lab or
                            healthcare facility without
                            consulting <a href='tel:1390'>1390</a> or your district MOH office.
                        </li>
                        <li translate="dontGoPublic">Don't go to any public places, stay at home, and don’t have any
                            visitors.</li>
                        <li translate="dontSharePersonal">
                            Don’t share personal items like dishes, cups, or towels and wash your hands often.</li>
                        <li translate="ifYouDoDevelopFever">
                            If you do need emergency medical assistance call <a href='tel:1390'>1390</a> and let them
                            know you may have COVID-19</li>
                    </ul>
                    <p translate="IfSymptomsWorsen">
                        If your symptoms worsen, or if you are concerned, please call <a href='tel:1390'>1390</a> or
                        your district MOH office immediately.
                    </p>
                    <div class="row">
                        <a class="text-center btn-success btn-lg btn" href="./home" translate="goHome">Go Back</a>
                        <a class="text-center btn-primary btn-lg btn" href="{{route('covidSelfCheck')}}" translate="startOver">Start
                            Over!</a>
                    </div>

                </div>
                <div class="card shadow recommendation" id="rec-3">
                    <div class="risk-meter mb-5">
                        <span translate="highRisk" class="float-left">High Risk</span>
                        <span translate="safe" class="float-right">Safe</span>
                        <div class="risk-level "></div>
                        <div class="risk-mark"></div>
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <img src="{{asset('covid/img/icon-0-danger.png')}}" alt="" class="icon icon-danger">
                    <h1 class="text-center text-danger" translate="call1390">Call 1390 Immediately</h1>
                    <p translate="rec3P1">
                        Avoid using public transportation to reach medical assistance, avoid close contact with anyone,
                        Wear a face mask or cover your mouth and nose
                        with some form of thick fabric, wash your hands with soap every 30 minutes or use alcohol based
                        sanitizer until medical assistance gets to you. Read our self-quarantine guide.
                    </p>
                    <div class="row">
                        <a href='tel:1390' class="btn btn-danger btn-lg text-center my-4" translate="callNow">Call
                            Now</a>
                    </div>
                    <a class="text-center btn-success btn-lg btn" href="./home" translate="goHome">Go Back</a>
                    <a class="text-center link" href="{{route('covidSelfCheck')}}" translate="startOver">Start Over!</a>
                </div>
                <div class="card shadow recommendation" id="rec-4">
                    <div class="risk-meter mb-5">
                        <span translate="highRisk" class="float-left">High Risk</span>
                        <span translate="safe" class="float-right">Safe</span>
                        <div class="risk-level "></div>
                        <div class="risk-mark"></div>
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <img src="{{asset('covid/img/icon-0-warning.png')}}" alt="" class="icon icon-warning">
                    <h1 class="text-center " translate="notTestTitle">You don’t need to be tested</h1>
                    <h4 class="mt-3" translate="rec4h1">But, you should Self-Quarantine because you have some symptoms
                    </h4>
                    <a translate="readGuide" href="#guide" class="text-primary text-center">Read our easy Self -
                        Quarantine Guide</a>
                    <p translate="rec4P1">
                        There are many common viruses other than COVID-19 that can cause your symptoms. Based on your
                        responses you do not need to be tested for COVID-19 at this time.</p>
                    <p translate="rec4P2">Testing is currently focused on individuals who have traveled outside Sri
                        Lanka or had contact
                        with someone diagnosed as having COVID-19, or have developed critical symptoms of COVID-19.</p>
                    <p translate="BecauseYouHaveSymtoms">Because you have some symptoms, you need to self-quarantine.
                    </p>
                    <ul>
                        <li translate="dontVisitHospital">Please do not visit a hospital, physician’s office, lab or
                            healthcare facility without
                            consulting <a href='tel:1390'>1390</a> or your district MOH office.
                        </li>
                        <li translate="dontGoPublic">Don't go to any public places, stay at home, and don’t have any
                            visitors.</li>
                        <li translate="dontSharePersonal">
                            Don’t share personal items like dishes, cups, or towels and wash your hands often.</li>
                        <li translate="ifYouDoDevelopFever">
                            If you do need emergency medical assistance call <a href='tel:1390'>1390</a> and let them
                            know you may have COVID-19</li>
                    </ul>
                    <p translate="IfSymptomsWorsen">
                        If your symptoms worsen, or if you are concerned, please call <a href='tel:1390'>1390</a> or
                        your district MOH office immediately.
                    </p>
                    <a class="text-center btn-success btn-lg btn" href="./home" translate="goHome">Go Back</a>
                    <a class="text-center btn-primary btn-lg btn" href="{{route('covidSelfCheck')}}" translate="startOver">Start
                        Over!</a>
                </div>
                <div class="card shadow recommendation" id="rec-5">
                    <div class="risk-meter mb-5">
                        <span translate="highRisk" class="float-left">High Risk</span>
                        <span translate="safe" class="float-right">Safe</span>
                        <div class="risk-level "></div>
                        <div class="risk-mark"></div>
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <img src="{{asset('covid/img/icon-0-info.png')}}" alt="" class="icon icon-info">
                    <h1 class="text-center " translate="notTestTitle">You don’t need to be tested</h1>
                    <h4 class="mt-3" translate="pleaseFollow">Please follow the government's instructions.
                    </h4>

                    <p translate="rec4P2">
                        Testing is currently focused on individuals who have traveled outside Sri Lanka or had contact
                        with someone diagnosed as having COVID-19, or have developed symptoms of COVID-19.</p>

                    <p translate="stay14Days">If you do develop any COVID-19 symptoms, you must self-isolate for 14 days
                    </p>
                    <ul>
                        <li translate="dontVisitHospital">Please do not visit a hospital, physician’s office, lab or
                            healthcare facility without
                            consulting <a href='tel:1390'>1390</a> or your district MOH office.
                        </li>
                        <li translate="dontGoPublic">Don't go to any public places, stay at home, and don’t have any
                            visitors.</li>
                        <li translate="dontSharePersonal">
                            Don’t share personal items like dishes, cups, or towels and wash your hands often.</li>
                        <li translate="ifYouDoDevelopFever">
                            If you do develop any Fever or Dry Cough or Difficulty in Breathing, take this
                            self-assessment again or Call <a href='tel:1390'>1390</a> or your district MOH office
                            immediately.</li>
                    </ul>
                    <p translate="rec1P4">
                        If you are experiencing other symptoms like Tiredness, Aches and Pains, Nasal Congestion, Runny
                        Nose, Sore Throat, Diarrhoea and want assessment contact: 1390 or your district MOH Office
                        immediately.
                    </p>
                    <p translate="followGovertmentRules">
                        Follow Government Regulations and Instructions Thoroughly, Avoid public places, and public
                        transportation at all time, Wear a face mask, Wash your hands with soap every 30 minutes, wash
                        your hands for at least 20 seconds, Avoid touching your face.

                    </p>
                    <a class="text-center btn-success btn-lg btn" href="./home" translate="goHome">Go Back</a>
                    <a class="text-center btn-primary btn-lg btn" href="{{route('covidSelfCheck')}}" translate="startOver">Start
                        Over!</a>
                </div>
                <div class="card shadow guide" id="guide">
                    <h1 class="text-center mb-4" translate="guideTitle"></h1>
                    <h2 translate="guideH1"></h2>
                    <p class="text-justify" translate="guideP1">

                    </p>
                    <h2 translate="guideH2"></h2>
                    <p class="text-justify" translate="guideP2">


                    </p>
                    <h2 translate="guideH3"></h2>
                    <ol>
                        <li translate="guideL1"></li>
                        <li translate="guideL2"></li>
                        <li translate="guideL3"></li>
                        <li translate="guideL4"></li>
                        <li translate="guideL5"></li>
                        <li translate="guideL6"></li>
                        <li translate="guideL7"></li>
                        <li translate="guideL8"></li>
                        <li translate="guideL9"></li>
                        <li translate="guideL10"></li>
                        <li translate="guideL11"></li>
                    </ol>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="buttons text-center">
                    <button id="btn-no" class="btn btn-secondary-primary btn-lg" translate="no">No</button>
                    <button id="btn-notsure" class="btn btn-secondary btn-lg" translate="notsure">Not Sure</button>
                    <button id="btn-yes" class="btn btn-primary btn-lg" translate="yes">Yes</button>
                    <br>
                    <button class="link btn mt-4" id="return" translate="returnBack">Return to previous
                        question</button>
                        <button class="link btn mt-4" id="goHome" translate="goHome">Go to Home Page</button>
                </div>
                <p></p>
            </div>
        </div>
    </div>

    <script src="{{asset('covid/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        var age = <?php echo Auth::user()->age; ?>;
        var gender = <?php echo Auth::user()->gender; ?>

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#insert_form').on("submit", function(event) {
                event.preventDefault();



                $.ajax({
                    url: "{{route('covidselfcheck.store')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "lang": "si",
                        "critical": 0,
                        "txt-q1": 0,
                        "txt-q2": 0,
                        "txt-q3": 0,
                        "txt-q4": 0,
                        "txt-q5": 0,
                        "txt-q6": 0,
                        "txt-q7": 0,
                        "txt-q8": 0,
                        "recommendation": 5
                    },
                    success: function(response) {
                        console.log(response);
                    },
                });
            });




        });
    </script>
    <script src="{{asset('covid/js/main.js')}}"></script>
    <script src="{{asset('covid/js/angular.min.js')}}"></script>
    <script src="{{asset('covid/js/angular-translate.min.js')}}"></script>
    <script src="{{asset('covid/js/translations.js')}}"></script>
</body>

</html>
