<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
        
           <div class="contants-to">
           @if(count($posts)>0)
           
            <div class="content">
                <div class="container">
                <div class="row">
              @foreach($posts as $post)
               <div class="col-md-4">
              <div class="panel panel-primary">
              <div class="panel-heading ">
               <h3 class="panel-title"><?php 
                echo ucwords($post->title);
               ?></h3>
              </div>
              <img src="/storage/apost_image/{{$post->featrued}}" alt="image"  class="img-thumbnail img-past">
              <div class="panel-body">
              <?php $frist=substr($post->content,0,50);echo $frist; ?> 

              <a class="pull-right" href="{{route('aposts.show',['id'=>$post->id])}}" >More</a>
              
               <span class=" alert-danger">Greated at : {{$post->created_at}} </span>
               
               <span class=" alert-info"> category : {{$post->category->name}} </span>
               
               <?php if (isset($post->user->name)) {?>
                <span class=" alert-info"> User : {{$post->user->name}} </span>
              <?php }else{?>
              <span class=" alert-info"> not found user </span>
               <?php }?>
                

              

                </div>
               </div>
              
               </div>
               @endforeach
             <!-- to make panting 2 can $posts->links() go to antzer page -->
              </div>
                </div>
                 
                   
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no posts</div>
            @endif
</div>
            @endsection