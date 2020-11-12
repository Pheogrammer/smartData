@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Register New Student</h5>
            <hr>
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
               <form action="{{route('savenewschool')}}" enctype="multipart/form-data" method="post">
                @csrf
                   <table class="table table-light">
                       <thead class="thead-light">
                           <tr>
                               <th></th>
                               <th>Name</th>
                               <th>Age</th>
                               <th>Class</th>
                               <th>Stream</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>
                                   <input type="checkbox" name="" id="">
                               </td>
                               <td>
                                   <input type="text" name="" id="">
                               </td>
                               <td>
                                   <input type="number" name="" id="">
                               </td>
                               <td>
                                   <input type="text" name="" id="">
                               </td>
                               <td>
                                   <input type="text" name="" id="">
                               </td>
                           </tr>
                       </tbody>
                   </table>
                  <input type="reset" value="Cancel" class="btn btn-danger">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </p>
       </div>
   </div>
</div>
@endsection
