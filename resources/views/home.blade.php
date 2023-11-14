@extends('layout.base')

@section('title')
    <title>Home | User List</title>
@endsection

@section('main-content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 m-auto bg-light py-4 px-5 shadow">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <span id="warning"></span>
              </div>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <span id="success"></span>
              </div>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <span id="danger"></span>
              </div>
                <h4 class="border-bottom border-2 border-primary py-2">User List</h4>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Start Update Modal --}}
      <!-- The Modal -->
      <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title border-bottom border-2 border-primary py-2">Update User Profile</h4>
              <button type="button" class="btn-close small" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body px-4">
              <form id="update-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userid" id="id_userid">
                <div class="mb-3">
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

                <div class="mt-3">
                  <label for="id_profile_image" class="form-label">Profile Image:</label>
                  <input type="file" name="profile_image" class="form-control" id="id_profile_image">
                  <span class="text-danger" id="profile_image_error"></span>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-dark px-2" onclick="submitUpdateForm()">Update Account</button>

              <button type="button" class="btn btn-danger px-2" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>

          </div>
        </div>
      </div>
    {{-- End Update Modal --}}

@endsection