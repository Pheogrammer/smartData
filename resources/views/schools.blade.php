@extends('layouts.app')

@section('content')
@php
    use App\student;
@endphp
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registered Schools</h5>
            <hr>
            <a href="{{route('newschool')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Add new school</a>

        </div>
    </div> <br>
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
   <div class="card">
       <div class="card-body">
           <p class="card-text">
               @if (count($school)>1)
               <table class="table table-light table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Total students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $d = 1;
                    @endphp
                    @foreach ($school as $item)

                            <tr>
                                <td>{{$d}}</td>
                                <td style="text-transform: capitalize;">{{$item->name}}</td>
                                <td > {{$item->location}} </td>
                                <td>
                                    @php
                                        $student = student::where('school',$item->id)->get();
                                    @endphp
                                    {{count($student)}}
                                </td>
                                <td>
                                    <a href="{{route('viewschool',[$item->id])}}" title="View Details" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                    <a href="" title="Edit Details" class="btn btn-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                    <a href="" title="Delete" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                </td>
                            </tr>
@php
    $d++;
@endphp
                    @endforeach
                </tbody>
                </tfoot>
            </table>
               @else
<h5 class="text-danger"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> No Schools Found</h5>
               @endif

           </p>
       </div>
   </div>
</div>
@endsection
