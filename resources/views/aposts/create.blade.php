<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class="contants-to">

           <div class="container">
              <div class="card">
              <div class="card-header ">
             Create post
            </div>
              <div class="card-body">
              <form action="{{route('aposts.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                  {{csrf_field()}}
              
                <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                @foreach($category as $categorys)
                <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                @endforeach
                </select>
                </div>

                <div class="form-check">
                @foreach($tags as $tag)
                
                <input type="checkbox" class="form-check-input" value="{{$tag->id}}" id="tag" name="tags[]">
                <label for="tag" class="form-check-label">{{$tag->tag}}</label><br>
                @endforeach
                </div>
                

                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="title" required="required">
                </div>
                <div class="form-group">
                <label for="content">Description</label>
                <textarea type="text" class="form-control" name="content" placeholder="Description" rows="8" cols="8"></textarea>
                </div>
                
                <div class="form-group">
                <label for="featrued">Photo</label>
                <input type="file" class="form-control-file" name="featrued">
                </div>
            
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-info">delete </button>
              
              </form>
                   
             </div>
            
                </div>
               </div>
               
</div>
           @endsection
