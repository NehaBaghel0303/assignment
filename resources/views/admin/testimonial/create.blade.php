@extends('backend.layout.app')
@section('section')
    <div class="container mt-3">
        <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <input type="text" class="form-control" placeholder="Enter Role" name="role">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

            
           
            
            
            <div class="form-group">
                <label for="">Discount</label>
                <input type="text" class="form-control" placeholder="Enter Price" name="discount">
            </div>
            
        </form>
    </div>
@endsection