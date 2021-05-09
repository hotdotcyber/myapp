@extends('layouts.master')

@section('content')
    <hr>   
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-6">
            <form method="POST" action="{{url('/message')}}">
                            @csrf
                  <div class="form-group">
                      <label for="comment">Enter Message:</label>
                      <textarea name="message" class="form-control" rows="5" id="comment"></textarea>
                    </div>

        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">UserName</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @if(count($users)>0)
    @foreach($users->all() as $user)
    <tr>
      <td>1</td>
      <td><input type="checkbox" name="phoneno[]" class="checkbox" value="{{$user->phoneno}}"/></td>
      <td>{{$user->email}}</td>
      <td>{{$user->phoneno}}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>                 
           </form>
             </div>
        </div>
 </div>

     <hr>
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

  </div>  
  </div> 
     
 </div>


@endsection
