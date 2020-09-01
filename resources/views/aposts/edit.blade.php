@extends('layout.dashing')
@section('content')

<div class="contants-to">        
<div class="container">
   <div class="card">
   <div class="card-header ">
    Edit post {{$posts->name}}
 </div>
   <div class="card-body">
   <form action="{{route('aposts.update',['id'=>$posts->id])}}" method="POST" class="form-group" enctype="multipart/form-data">
       {{csrf_field()}}
   
     <div class="form-group">
     <label for="category">Category</label>
     <select name="category_id" id="category" class="form-control">
     @foreach($category as $categorys)
     <option value="{{$categorys->id}}" <?php 

      if ($posts->category_id == $categorys->id) {echo 'selected';}

     ?>>{{$categorys->name}}</option>
     @endforeach
     </select>
     </div>


     <div class="form-check">
         @foreach($tags as $tag)
        <label for="tag" class="form-check-label">
        <input type="checkbox"
        @foreach ($posts->tags as $ta)
        @if($tag->id == $ta->id)
        checked
        @endif
        @endforeach 
        class="form-check-input" value="{{$tag->id}}" id="tag"  name="tags[]">
        {{$tag->tag}}  </label><br>
        @endforeach
      </div>


     <div class="form-group">
     <label for="title">Title</label>
     <input type="text" class="form-control" name="title"  value="{{$posts->title}}" required="required">
     </div>
     <div class="form-group">
     <label for="content">Description</label>
     <textarea type="text" class="form-control" name="content"  rows="8" cols="8" required="required">{{$posts->content}}</textarea>
     </div>
     <div class="form-group">
     <label for="featrued">Photo</label>
     <input type="file" class="form-control-file" name="featrued">
     </div>
 
     <button type="submit" class="btn btn-primary">Update</button>
   
   </form>
        
  </div>
       

     </div>
    </div>
    
</div>
@endsection
