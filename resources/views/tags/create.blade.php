<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Create tag
            </div>
              <div class="card-body">
              <form action="{{route('tags.store')}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="tag">tag</label>
                <input type="text" class="form-control" name="tag" placeholder="tags" required="required">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>   
              </form>
                   
             </div>
                  

                </div>
               </div>
               
</div>
           @endsection
