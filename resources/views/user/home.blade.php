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
            <h3>What is Lorem Ipsum?</h3>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
                    <video class="col-lg-12"controls="true">
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
            <h5>What is the Question</h5>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" checked="false">
                <label for="customCheckbox1" class="custom-control-label">answer1</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="false">
                <label for="customCheckbox2" class="custom-control-label">answer2</label>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
        </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>



@endsection
