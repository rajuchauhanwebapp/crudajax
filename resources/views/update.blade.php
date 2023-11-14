@extends('layout.base')

@section('title')
    <title>Update Account Record</title>
@endsection

@section('main-content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-sm-8 col-md-8 m-auto bg-light py-4 px-5 shadow">
                <h4 class="border-bottom border-2 border-primary py-2">Update User Profile</h4>
                <form id="update-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                      <label for="id_name" class="form-label">Full Name:</label>
                      <input type="text" name="name" class="form-control" id="id_name" placeholder="Enter Full Name">
                    </div>

                    <div class="mb-3">
                      <label for="id_mobile" class="form-label">Mobile:</label>
                      <input type="number" name="mobile" class="form-control" id="id_mobile" placeholder="Enter Mobile">
                    </div>

                    <div class="mb-3 mt-3">
                      <label for="id_email" class="form-label">Email:</label>
                      <input type="email" name="email" class="form-control" id="id_email" placeholder="Enter email">
                    </div>
                    
                    <div class="mb-3 mt-3">
                      <label for="id_role" class="form-label">Role:</label>
                      <select name="role" id="id_role" class="form-select">
                        <option value="guest">Guest</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>

                    <div class="mb-3 mt-3">
                      <label for="id_profile_image" class="form-label">Profile Image:</label>
                      <input type="file" name="profile_image" class="form-control" id="id_profile_image">
                    </div>

                    <button type="button" class="btn btn-dark px-4" onclick="formSubmit()">Update Account</button>
                  </form>
            </div>
        </div>
    </div>
@endsection