$(document).ready(function () {
    $("#login").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();

        var isValid = true;
        if (email == '') {
            isValid = false;
            $("#erroremail").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email Field Cannot be empty</div> ");

        }
        else {
            $("#erroremail").html("");
        }
        if (password == '') {
            isValid = false;
            $("#errorpassword").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Field Cannot be empty</div> ");

        }
        else {
            $("#errorpassword").html("");
        }
        //Ajax code goes here
        if (isValid == true) {
            $.ajax({
                url: "login_user.php",
                type: "POST",
                data: {
                    email: email,
                    password: password
                },
                success: function () {

                }


            });

        }
        else {
            return false;
        }


    });


});
