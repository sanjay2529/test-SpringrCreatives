@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                <div class="row justify-content-between">
                   <div class="col-md-2">
                       {{ __('User Records') }}
                   </div>
                    <div class="col-md-2">
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New User</button> 
                       <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content py-4">
                      
                      <h5 class="modal-title text-center" id="staticBackdropLabel">Add New User</h5>
                      
                      <div class="modal-body">
                      <form action="/add_users" method="POST"  enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-md-12 pb-3">
                                   <div class="row">
                                       <div class="col-md-4"><label>Email</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="email" placeholder="Enter Your Email">  </div>
                                   </div> 
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="row">
                                        <div class="col-md-4"><label>Full Name</label></div>
                                        <div class="col-md-8"><input class="form-control" type="text" name="name" placeholder="Enter Your Full Name">  </div>
                                   </div> 
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="row">
                                        <div class="col-md-4"><label>Date of Joining</label></div>
                                        <div class="col-md-8"><input class="form-control" type="date" name="date_of_joining">  </div>  
                                   </div> 
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="row">                                      
                                        <div class="col-md-4"><label>Date of leaving</label></div>
                                        <div class="col-md-4"><input class="form-control date_of_leaving " data="0" type="date" name="date_of_leaving" >  </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check1" name="Still_Working" value="true" >
                                        <label class="form-check-label">Still Working</label></div>
                                        </div>
                                   </div> 
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="row">
                                       <div class="col-md-4"><label>Profile Image</label></div>
                                        <div class="col-md-8"><input class="form-control" type="file" name="profile_img"></div>
                                   </div> 
                                </div>


                            </div>
                         <div class="row justify-content-center">
                           <div class="col-md-2">
                               <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">submit</button> 
                           </div>  
                         </div>
                             
                      </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
                    </div>
                </div>  
                </div>

                <div class="card-body">
                   <table class="table">
                      <caption>List of users</caption>
                      <thead>
                        <tr>
                          <th scope="col">Avatar</th>
                          <th scope="col">name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Experince </th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user_record as $user)
                        <tr>
                          <th scope="row"><img style="max-height:50px" src="{{ asset($user->profile_img) }}" alt="Avatar" ></th>
                          <td>{{ $user->name}}</td>
                          <td>{{ $user->email_id}}</td>
                          <td>
                             @php
                                $datetime1 = new DateTime($user->joindate);
                                $datetime2 = new DateTime($user->leavedate);
                                $interval = $datetime1->diff($datetime2); 
                                $exp = $exp=trim($interval->format('%R%Y years'),"+")." ".trim($interval->format('%R%M  Months'),"+");
                               
                                echo$exp; 
                                
                            @endphp  
                          </td>
                          <td><a href="/delete/{{ $user->id}}">Remove</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
  .readonly{
    pointer-events: none;
    color: darkblue;
  }  
</style>
<script type="text/javascript">
    $(document).ready(function(){
      $("#check1").click(function(){
         $(".date_of_leaving").toggleClass('readonly'); 
      });
    });
</script>
@endsection