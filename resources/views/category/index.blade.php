@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to">  
           @if(count($category)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           category
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        <th scope="col">Cound Posts</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $categorys)
                        <tr>
                        <th scope="row">{{$categorys->id}}</th>
                        <td>{{$categorys->name}}</td>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('category.edit',['id'=>$categorys->id])}}">Eidt</a> <i class="fas fa-edit"></i></td>
                        @if($categorys->aposts()->count()>0)
                        <td>Can`t Delete</td>
                        @else
                        <td><a href="{{route('category.delete',['id'=>$categorys->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
                        @endif
                        @endif
                        <td>{{$categorys->aposts()->count()}}</td>
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
</div>
            @endsection