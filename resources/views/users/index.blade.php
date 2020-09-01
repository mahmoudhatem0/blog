@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           @if(Auth::user()->admin)
           @if(count($users)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           Users
                       </div>
                      <div class="card-body">
            
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">name</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                        <th scope="row">
                         <?php if (isset($user->profile->avatar)) {?>
                       <img src="/storage/avatar/{{$user->profile->avatar}}" alt="image"  class="img-thumbnail">
                          <?php 
                         }else{?>
                        <img src="/storage/avatar/avatar.png" alt="image"  class="img-thumbnail">
                        <?php
                         }
                         ?>
                        </th>
                        <th>{{$user->name}}</th>
                        <th>
                        @if($user->admin)
                        <a href="{{route('users.notAdmin',['id'=>$user->id])}}">delete admin </a>
                        @else
                        <a href="{{route('users.admin',['id'=>$user->id])}}">Make admin </a>
                        @endif
                        </th>
                        <th><a href="{{route('user.delete',['id'=>$user->id])}}">delete </a> <i class="fas fa-trash-alt"></i></th>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        
                        
                  </div>
                </div>   
            </div>
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no posts</div>
            @endif
            @else
              
              <h1>cant see this page</h1>
   
               @endif
                        </div>
            @endsection