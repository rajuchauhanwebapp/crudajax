@extends('layout.base')

@section('title')
    <title>Create Account</title>
@endsection

@section('main-content')
    <div class="container pb-5">
      <div class="row">
        <div class="col-sm-8 col-md-8 m-auto bg-light py-4 px-5 shadow">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <span id="success"></span>
              </div>
                <h4 class="border-bottom border-2 border-primary py-2">Create New User Profile</h4>
                <form id="create-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                      <label for="id_name" class="form-label">Full Name:</label>
                      <input type="text" name="name" class="form-control" id="id_name" placeholder="Enter Full Name">
                      <span class="text-danger" id="name_error"></span>
                    </div>

                    <div class="mb-3">
                      <label for="id_mobile" class="form-label">Mobile:</label>
                      <input type="number" name="mobile" class="form-control" id="id_mobile" placeholder="Enter Mobile">
                      <span class="text-danger" id="mobile_error"></span>
                    </div>

                    <div class="mb-3 mt-3">
                      <label for="id_email" class="form-label">Email:</label>
                      <input type="email" name="email" class="form-control" id="id_email" placeholder="Enter email">
                      <span class="text-danger" id="email_error"></span>
                    </div>
                    
                    <div class="mb-3 mt-3">
                      <label for="id_role" class="form-label">Role:</label>
                      <select name="role" id="id_role" class="form-select">
                        <option value="guest">Guest</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                      <span class="text-danger" id="role_error"></span>
                    </div>

                    <div class="mb-3 mt-3">
                      <label for="id_profile_image" class="form-label">Profile Image:</label>
                      <input type="file" name="profile_image" class="form-control" id="id_profile_image">
                      <span class="text-danger" id="profile_image_error"></span>
                    </div>

                    <button type="button" class="btn btn-primary px-4" onclick="formSubmit()">Create Account</button>
                  </form>
            </div>
        </div>
    </div>
@endsection