$(document).ready(function () {
    //open signup form
    $('.create-account').click(function (e) {
        $(".signup-new")[0].reset();
        $('.signin-form').fadeOut();
        $("#errorName").text("");
        $("#errorEmail").text("");
        $("#errorPassword").text("");
        $("#errorUsername").text("");
        $("#errorDOB").text("");
        e.preventDefault();
        $('.signup-form').fadeIn();
        $('.overlay').fadeIn();
        $('body').css('overflow', 'hidden');
    });

    $('.close-form').click(function () {
        $('.signup-form').fadeOut();
        $('.overlay').fadeOut();
        $('body').css('overflow', 'auto');
    });

    // open signin form 
    $('.sign-in-account').click(function (e) {
        $(".empty-form")[0].reset();
        e.preventDefault();
        $('.signin-form').fadeIn();
        $('.overlay').fadeIn(); // show overlay
        $('body').css('overflow', 'hidden');
    });

    $('.close-signin').click(function () {
        $('.signin-form').fadeOut();
        $('.overlay').fadeOut(); // hide overlay
        $('body').css('overflow', 'auto');
    });

    // Prevent clicks on background when popup is open form
    $('.signup-form, .signin-form').on('click', function (e) {
        e.stopPropagation();
    });

    // sign up form validation
    // on blur
    $("input").blur(function(){
        var nameRgxpattern = /^[A-Za-z ]{3,20}$/;
        var usernamergxpattern = /^[a-z0-9_.]{5,15}$/;
        var emailRgxpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
        var passRgxpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;

        let inputID = $(this).attr("id");
        if($(this).val()=== ''){
            $("#error"+inputID).text(inputID+" field is Require");
            $("#error"+inputID).css({"color":"red", "fontSize":"12px", "font-weight":"500"});
        }else{
            $("#error"+inputID).text("");
            // Regex for Name
            if($("#Name").attr("id") === inputID){
                var nameVal = $(this).val().trim();
               if(nameRgxpattern.test(nameVal)){
                $("#errorName").text("");
               }else{
                $("#errorName").text("minimum 3 and maximum 20 characters allow");
                $("#errorName").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
               }
            }

            // Regex for Username
            if($("#Username").attr("id") === inputID){
                var usernameVal = $(this).val().trim();
                if(usernamergxpattern.test(usernameVal)){
                    //check username exits
                    var usercheck = "action"
                    $.ajax({
                        url: "controller.php",
                        type: 'post',
                        data: {
                            "username": usernameVal,
                            "usernameexits": usercheck
                        },
                        success : function(response){
                            var userexitsdata = JSON.parse(response);
                            if(userexitsdata.status == 'failed'){
                                $("#validuserinput").val("failed");
                                $("#errorUsername").text("username has already been taken.");
                            }else{
                                $("#validuserinput").val("success");
                                $("#errorUsername").text("");
                            }
                        }
                    });
                }else{
                 $("#errorUsername").text("(!invalid username)allow only a-z,0-9,_,.(5-15)");
                 $("#errorUsername").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
                }
             }

             // Regex for Email
            if($("#Email").attr("id") === inputID){
                var emailVal = $(this).val().trim();
               if(emailRgxpattern.test(emailVal)){
                $("#errorEmail").text("");
                //check email exits
                var emailcheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "email": emailVal,
                        "mailexits": emailcheck
                    },
                    success : function(response){
                        var data = JSON.parse(response)
                        if(data.status == 'failed'){
                            $("#validmailinput").val("failed");
                            $("#errorEmail").text("Email has already been taken.");
                        }else{
                            $("#errorEmail").text("");
                            $("#validmailinput").val("success");
                        }
                    }
                });
               }else{
                $("#errorEmail").text("Invalid email...!");
               }
            }

            // Regex for Password
            if($("#Password").attr("id") === inputID){
                var passwordVal = $(this).val().trim();
               if(passRgxpattern.test(passwordVal)){
                $("#errorPassword").text("");
               }else{
                $("#errorPassword").text("Invalid password..(8/15)");
                $("#errorPassword").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
               }
            }
        }
    });

    //remove validation on focus 
    $("input").focus(function(){
        let focusID = $(this).attr("id");
        $("#error"+focusID).text("");
    });


    // validation on submit
    $(".signup-new").submit(function(event){
        var namepattern = /^[A-Za-z ]{3,20}$/;
        var usernamepattern = /^[a-z0-9_.]{5,15}$/;
        var emailpattern = /^[a-z0-9.]+@[a-z]+\.[a-z]{2,6}$/;
        var passpattern = /^[a-zA-Z0-9!@#$%^&*()_+-=]{8,15}$/;
        var isValid = true;
        if($("#Name").val()=== ''){
            $("#errorName").text("Name field is Require");
            $("#errorName").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
            isValid = false;
        }else{
            // Regex for Name on submit
            nameValue = $("#Name").val();
            if(namepattern.test(nameValue)){
                $("#errorName").text("");
            }else{
                $("#errorName").text("minimum 3 and maximum 20 characters allow");
                $("#errorName").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
                isValid = false;
            }
        }

        if($("#Username").val()=== ''){
            $("#errorUsername").text("Username field is Require");
            $("#errorUsername").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
            isValid = false;
        }else{
            // Regex for Name on submit
            userValue = $("#Username").val();
            if(usernamepattern.test(userValue)){
                //check username exits
                var usernamecheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "username": userValue,
                        "usernameexits": usernamecheck
                    },
                    success : function(response){
                        var userdata = JSON.parse(response);
                        if(userdata.status == 'failed'){
                            $("#validuserinput").val("failed");
                            $("#errorUsername").text("username has already been taken.");
                        }else{
                            $("#validuserinput").val("success");
                            $("#errorUsername").text("");
                        }
                    }
                });
            }else{
                $("#errorUsername").text("(!invalid username)allow only a-z,0-9,_,.(5-15)");
                $("#errorUsername").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
                isValid = false;
            }
        }

        if($("#Password").val()=== ''){
            $("#errorPassword").text("Password field is Require");
            $("#errorPassword").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
            isValid = false;
        }else{
            passValue = $("#Password").val();
            if(passpattern.test(passValue)){
                $("#errorPassword").text("");
            }else{
                $("#errorPassword").text("Invalid password..(8/15)");
                $("#errorPassword").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
                isValid = false;
            }
        }

        if($("#Email").val()=== ''){
            $("#errorEmail").text("Email field is Require");
            isValid = false;
        }else{
            emailValue = $("#Email").val();
            if(emailpattern.test(emailValue)){
                //check email exits
                var emailcheck = "action"
                $.ajax({
                    url: "controller.php",
                    type: 'post',
                    data: {
                        "email": emailValue,
                        "mailexits": emailcheck
                    },
                    success : function(response){
                        var data = JSON.parse(response);
                        if(data.status == 'failed'){
                            $("#validmailinput").val("failed");
                            $("#errorEmail").text("Email has already been taken.");
                        }else{
                            $("#validmailinput").val("success");
                            $("#errorEmail").text("");
                        }
                    }
                });
            }else{
                $("#errorEmail").text("Invalid email...!");
                isValid = false;
            }
        }

        if($("#DOB").val()=== ''){
            $("#errorDOB").text("DOB field is Require");
            $("#errorDOB").css({"color":"red", "fontSize":"12px", "font-weight":"500"});
            isValid = false;
        }

        if($("#validmailinput").val()=== 'failed'){
            isValid = false;
        }

        if($("#validuserinput").val()=== 'failed'){
            isValid = false;
        }

        if(!isValid){
            event.preventDefault();
        }else{

        }
    });

    // login request
    // $(".signup-new").submit(function(e){
    // })
    
});