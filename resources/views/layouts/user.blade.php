<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Logged</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
        <div class="container-fluid main-container">
            <a href="/" class="navbar-brand d-flex w-50 mr-auto">
                <img src="{{asset('img/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">

                <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sashen
                            <img src="https://placehold.it/60x60" alt="" class="text-right rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Logout</a>

                        </div>
                    </li>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-wrap"></div>
    <div class="container-fluid main-container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-white my-5"><span class="text-normal">Good Morning,</span> Sashen</h3>
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
                <h3 class="text-primary text-medium mb-4">Hand Washing</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam tincidunt ut laoreet dolore magna aliquam erat volutUt wisi enim </p>
                <a href="#" class="btn btn-primary btn-block mt-5">Answer Today Questions</a>
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
    <footer class="mt-5">
        <div class="d-flex justify-content-between  main-container">
            <div class="p-2 bd-highlight">Pluto Pro &copy; 2020</div>
            <div class="p-2 bd-highlight">Engineered by <a href="#">Innovus.lk</a></div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>