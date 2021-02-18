 <div class="card">
     <?php
require("./includes/assessor-check.php");
require("./database/config.php");
?>
     <div class="card-header text-black h-100 no-radius text-center"><strong>Change
             Password</strong></div>
     <div class="alert alert-success alert-dismissible text-center" id="success" style="display:none;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
     </div>

     <div class="alert alert-danger alert-dismissible text-center" id="error" style="display:none;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
     </div>

      <div class="alert alert-danger alert-dismissible text-center" id="error-message" style="display:none;">Password do not match..
         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
     </div>


     <div class="card-body">
         <div id="message"></div>

         <form name="frmChange" method="post" action="" id="resetform" onSubmit="return validatePassword();">

             <div class="form-group">
                 <label for="current_password"><strong>Current Password:</strong></label>
                 <input type="password" class="form-control" id="currentPassword" name="currentPassword">
             </div>
             <div class="form-group">
                 <label for="new_password"><strong>New Password:</strong></label>
                 <input type="password" class="form-control" id="newPassword" name="newPassword">
             </div>
             <?php
                                        $id=$_SESSION['aid'];
                                        echo '<input type="hidden" id="id" name="id" value="'.$id.'">';
                                        ?>
             <div class="form-group">
                 <label for="new_password_confirmation"><strong>Confirm New
                         Password:</strong></label>
                 <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
             </div>
             <input type="submit" class="btn btn-success btn-sm" name="password_change" id="submit_btn"
                 value="Change Password" />
             <input type="reset" class="btn btn-danger btn-sm" value="Reset" />
         </form>
     </div>
 </div>
 <script src="./js/pwdchange.js"></script>

 <script>
$(document).ready(function() {

    $("#resetform").submit(function(e) {
        e.preventDefault();

        //disable the submit button
        $("#submit_btn").attr("disabled", true);
        return true;
    });

    var frm = $('#resetform');
    frm.submit(function(e) {
        e.preventDefault();

        var formData = frm.serialize();
        formData += '&' + $('#submit_btn').attr('name') + '=' + $('#submit_btn').attr('value');

        $.ajax({
            type: "POST",
            url: "./api/assessor-pwd.php",
            data: formData,
            success: function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if (data.statusCode == 200) {
                    $("#success").show();
                    $('#resetform')[0].reset();
                    $('#success').html('Password updated !').delay(3000).fadeOut(3000);
                    $("#submit_btn").attr("disabled", false);
                    return false;

                } else if (data.statusCode == 201) {
                    $("#error").show();
                    $('#resetform')[0].reset();
                    $('#error').html('Old password not matching !').delay(3000).fadeOut(
                        3000);
                        $("#submit_btn").attr("disabled", false);
                    return false;
                }
            }
        });
    });
});
 </script>