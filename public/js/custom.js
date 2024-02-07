$("#btn-delete").click(function(){
    Swal.fire({
        icon: "question",
        title: "Delete Post",
        text: "Are you sure you want to delete this post?",
        showCancelButton: true,
        confirmButtonText: "Proceed",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $("#delete-form").submit();
        }
      });
});


$("#btn_updt_usr").click(function(){

    if($("#user-update-form #password").val() != $("#user-update-form #password_confirmation").val()){
        Swal.fire({
            icon: "warning",
            title: "Mismatch Password",
            text: "Please make sure the password and confirmation password are same.",
            confirmButtonText: "Ok",
          });


        return;
    }

    Swal.fire({
        icon: "question",
        title: "Update Profile",
        text: "Are you sure you want to update your profile?",
        showCancelButton: true,
        confirmButtonText: "Proceed",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $("#user-update-form").submit();
        }
      });
    
});


$("#btn_registration").click(function(){
    
    if($("#user-registation-form #password").val() != $("#user-registation-form #password_confirmation").val()){
        Swal.fire({
            icon: "warning",
            title: "Mismatch Password",
            text: "Please make sure the password and confirmation password are same.",
            confirmButtonText: "Ok",
          });
        return;
    }


    $("#user-registation-form").submit();



});


// $("#user-registation-form #password").change(function(){
//     if($(this).val().find)
// });

$("#showpassword").click(function(){

    if($(this).prop("checked")){
        
        $("#login-form #password").attr('type', 'text');
    }else{
        $("#login-form #password").attr('type', 'password');

    }
    // alert(1);
})