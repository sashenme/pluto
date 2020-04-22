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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero aut veritatis magni adipisci quidem reiciendis incidunt? Minima soluta cumque fuga quidem adipisci, nisi nemo optio possimus quam voluptatibus explicabo dolorum itaque sequi voluptate laudantium ab est fugiat illo. Dolore architecto, velit molestias voluptatem quos tenetur recusandae alias quasi in omnis itaque esse porro illo dignissimos repellendus, eos nostrum? Quo ea corrupti facere iure nihil et consequatur totam nesciunt suscipit ipsa sint molestias recusandae tempore unde, in corporis repellendus quia tenetur cum quisquam nostrum maiores a repellat ducimus. Explicabo assumenda exercitationem quod quam quas, autem in sequi culpa ex praesentium. Nam perferendis animi quos maiores, explicabo magni excepturi at voluptatem tenetur magnam eligendi? Error odit ex accusamus tempora cupiditate rerum temporibus sequi corporis nulla commodi neque, eaque consectetur possimus est deleniti quis voluptatem sint quia fugiat. Voluptatibus laudantium consectetur animi aspernatur ipsum aliquid quia impedit tenetur ipsa quis, optio placeat iusto necessitatibus vitae qui suscipit accusantium debitis ad maiores! Nulla quae nisi accusantium dignissimos dolore quod est provident tempora modi. Delectus iusto neque maiores fugit reiciendis impedit nostrum magni inventore ea, vel qui deserunt suscipit consequatur commodi praesentium recusandae? Placeat dolor accusantium cumque, unde natus facilis qui accusamus tempora temporibus delectus alias, harum recusandae aperiam earum nemo possimus consectetur voluptas eaque odio velit! Tenetur accusantium id magni, doloremque impedit quaerat facere debitis totam eum rerum iusto nemo, ad est fuga temporibus itaque fugit recusandae officia veritatis? Quis ut eaque fuga ducimus eligendi assumenda iure sed vero sunt. Temporibus dolor voluptates quos, nesciunt odio illo aut iusto quo reprehenderit repudiandae mollitia velit molestias eveniet a, officia vel itaque saepe! Cupiditate voluptatem velit itaque. Recusandae molestiae incidunt fuga sit laudantium accusantium natus fugiat possimus veritatis pariatur atque necessitatibus aliquid culpa architecto quo quisquam, repudiandae commodi est eveniet velit omnis dolor fugit? Iure maiores iusto itaque, qui incidunt et esse tempora praesentium quod optio, explicabo vel quos, totam laudantium quo porro earum? Commodi tempore obcaecati facilis asperiores aperiam sapiente, alias cupiditate officia, sunt corrupti placeat eius ex, repudiandae ratione qui perspiciatis rem. Dolor, aut adipisci architecto est, cumque laudantium ea officiis veniam sed, odio sint. Earum incidunt recusandae vitae ad dolorum odio quisquam maiores, vel eius. Magni laudantium deleniti eligendi, non natus quo quasi inventore libero eaque quos exercitationem nobis vel voluptas blanditiis architecto odio perferendis eveniet beatae veniam saepe qui quis officiis. Itaque totam esse modi vitae ducimus quasi suscipit accusamus ipsum non ipsam ullam dolores iste accusantium, illo expedita. Ducimus nemo quos excepturi vitae eligendi maxime, rerum nisi veritatis officia! Delectus architecto minima beatae? Rerum eius veniam, quas ex dignissimos nulla excepturi alias corrupti odit accusantium ipsum dolor debitis ipsa perferendis adipisci dolore totam fugiat quaerat esse impedit unde voluptatem. Minus rerum totam minima impedit neque aspernatur sit eveniet explicabo numquam consectetur eum blanditiis, enim sapiente dolor ea adipisci sunt voluptatibus nesciunt aut odio voluptas nemo et? Voluptatibus fugit nemo est ab quisquam dolor culpa similique, sed fugiat quam explicabo soluta veniam, temporibus harum suscipit at accusamus asperiores! Sint quam ea optio?</p>
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
                @if ($questions_set->count() > 0)
                @foreach($questions_set as $qSet)
                <h3>{{$qSet->title}}</h3>
                <p>{{$qSet->description}}</p>
                @endforeach
                <div class="media">
                    <div class="media-body" style="margin: 0 auto;">
                        <video class="col-lg-12" controls="true">
                            <source src="/videos/who-hygiene-reminder.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
                @if($dailyQuiz)
                <a href="{{route('dailyQuiz')}}" class="btn btn-info text-center mt-5">Answer to Daily Quiz</a>
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
            <!-- /.card-body -->
        </div>
    </div>
</div>





@endsection