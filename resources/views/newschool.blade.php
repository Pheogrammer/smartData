@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add new school</h5>
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
                   <div class="form-group">
                     <label for="">School Name  <sup class="text-danger">*</sup> </label>
                     <input type="text" name="name" required id="" value="{{ old('name') }}" class="form-control" placeholder="" aria-describedby="helpId">
                   </div>
                   <div class="form-group">
                    <label for="">Location  <sup class="text-danger">*</sup> </label>
                    <input type="text" name="location" value="{{ old('location') }}" required id="" class="form-control" placeholder="" aria-describedby="helpId">
                  </div>
                  <input type="reset" value="Cancel" class="btn btn-danger">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </p>
       </div>
   </div>
</div>
@endsection
