$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function formSubmit() {
   var formData = new FormData($("#create-form")[0]);
   
   $.ajax({
      type: "POST",
      url: "create-account/",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
         if (response.status == 400) {
            $('.text-danger').html('');
            $.each(response.message, function (key, value) { 
               document.getElementById(key + '_error').innerText = value;
            });
         } else if(response.status == 200) {
            $('.text-danger').html('');
            document.getElementById('success').innerText = response.message;
            $('.alert-success').show();
            document.getElementById('create-form').reset();
            window.scrollTo(0,0);
         }
      }
   });
}

function getRecords() 
{
   $.ajax({
      type: "GET",
      url: "get-records/",
      dataType: "json",
      success: function (response) {
         $('tbody').html('');
         $.each(response.user_list, function (key, user) { 

            $('tbody').append('<tr>\
                             <th>' + user.id + '</th>\
                             <td>' + user.name + '</td>\
                             <td>' + user.mobile + '</td>\
                             <td>' + user.email + '</td>\
                             <td>' + user.role + '</td>\
                             <td>\
                               <img src="'+user.profile_image+'" alt="" width="80">\
                             </td>\
                             <td>\
                               <button type="button" value=" '+user.id+'" class="btn btn-info btn-sm" onclick="updateForm(this)">Edit</button>\
                               &nbsp;\
                               <button type="button" value=" '+user.id+'" class="btn btn-danger btn-sm" onclick="delete_profile(this)">Delete</button>\
                             </td>\
                           </tr>');
         });

      }
   });
}
getRecords();

function updateForm(user) {
   var userid = user.value;
   $.ajax({
      type: "GET",
      url: "edit-profile/"+userid,
      success: function (response) 
      {
         const user = response.user;
         if (response.status == 200) 
         {
            $('#id_userid').val(user.id);
            $('#id_name').val(user.name);
            $('#id_mobile').val(user.mobile);
            $('#id_email').val(user.email);
            $('#id_role').val(user.role);
            $('#updateModal').modal('show')
         } 
         else if(response.status == 404)
         {
            $('#warning').text(response.message);
            $('.alert-warning').show();
            window.scrollTo(0, 0);
         }
      }
   });
}


function submitUpdateForm() {
   var updateFormData = new FormData($('#update-form')[0]);
   $.ajax({
      type: "POST",
      url: "save-profile/",
      data: updateFormData,
      contentType: false,
      processData: false,
      success: function (response) {
         console.log(response);
         if (response.status == 400) {
            $('.text-danger').html('');
            $.each(response.message, function (key, value) { 
               document.getElementById(key + '_error').innerText = value;
            });
         } 
         else if(response.status == 200) 
         {
            getRecords();
            $('#updateModal').modal('hide')
            $('.text-danger').html('');
            document.getElementById('success').innerText = response.message;
            $('.alert-success').show();
            document.getElementById('update-form').reset();
            window.scrollTo(0,0);
         }
      }
   });
}

function delete_profile(user) {
   var userid = user.value;
   $.ajax({
      type: "GET",
      url: "delete-profile/"+userid,
      success: function (response) 
      {
         getRecords();
         $('#danger').text(response.message);
            $('.alert-danger').show();
            window.scrollTo(0, 0);
      }
   });
}