@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div> <br>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                 <ul class="alert alert-danger" style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li><?php echo $error; ?></li>
                    @endforeach
                </ul>
            </div> <br>
        @endif
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Schools</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="btn badge-primary"> <b>12</b> </span>

                                    </div>
                                    <div class="col">
                                        <a href="{{route('newschool')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Add new school</a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Trainers</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-4">
                                            <span class="btn badge-primary"> <b>12</b> </span>
                                    </div>
                                    <div class="col">
                                        <a href="" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Add new trainer</a>
                                    </div>
                                </div></p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Teams</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="btn badge-primary"> <b>12</b> </span>

                                    </div>
                                    <div class="col">
                                        <a href="" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Add new team</a>
                                    </div>
                                </div></p>
                        </div>
                    </div>
                </div>
            </div><br>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
