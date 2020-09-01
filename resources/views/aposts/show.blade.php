<!-- extend the app to get all information here -->
@extends('layout.dashing')

             @section('content')
             <div class="contants-to">
              <div class="content">
                  <div class="container">
                  <div class="row">
                    <div class="col">
                       <div class="panel panel-primary">
                        <div class="panel-heading ">
                            <h3 class="panel-title">{{$posts->title}}</h3>
                            @if(Auth::user()->admin)
                            <a class="pull-right" href="{{route('aposts.edit',['id'=>$posts->id])}}" >eidt <i class="fas fa-edit"></i></a>
                            <a class="right confirm" href="{{route('aposts.delete',['id'=>$posts->id])}}">Delete <i class="fas fa-trash-alt"></i></a>
                            @endif
                         </div>
                       <div class="panel-body">
                       <img src="/storage/apost_image/{{$posts->featrued}}" alt="image" style="width:50%,height:50%" class="img-thumbnail">
                      <h2>{{$posts->name}}</h2> 
                      <p> {{$posts->content}} </p>
                       <span class=" alert-danger">Greated at : {{$posts->created_at}} </span>
                      
                       <a class="pull-right" href="/user/aposts" >back</a>
                       </div>
                 </div>
                  </div>
               
             
              </div>
                </div>

            </div>
</div>
            @endsection