@extends('backend.layout.app')
@section('section')
    <div class="container mt-3">
        <form id="userForm">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="">phone Number</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number">
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" class="form-control" placeholder="Enter Role" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" class="form-control" placeholder="Enter Role" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="">price</label>
                <input type="number" class="form-control" placeholder="Enter Role" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="">dob</label>
                <input type="date" class="form-control" placeholder="Enter Role" name="dob" id="dob">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection 
<script type="text/javascript">
 
</script>