<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="script.js"></script>
    <title>sign up & sign in page</title>
</head>
<body>
    <div class="container">
        <div class="left-logo">
            <img src="image\logo.svg" alt="No logo">
        </div>

        <div class="right_side">
            <div class="right-items">
                <h1>Happening now</h1>
                <h2 style="margin-bottom: 30px;">Join today</h2>
                 <div class="signup-options">
                    <div class="google">
                        <a class="google-signup">
                            <img src="image\google_logo.png" alt="No G-logo">
                            <p>Sign up with Google</p>
                        </a>
                    </div>

                    <div class="apple">
                        <a class="apple-signup" href="">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                            <p>Sign up with Apple</p>
                        </a>
                    </div>

                    <div class="or">
                        <hr><Span>OR</Span><hr>
                    </div>

                    <div class="account">
                        <a class="create-account">
                            <p>Create account</p>
                        </a>
                    </div>

                    <div class="terms">
                        <p>By signing up, you agree to the <a href="">Terms of Service</a> and <a href=""> Privacy Policy,</a>including <a href="">Cookie Use.</a></p>
                    </div>

                    <div style="margin-left:40px;">
                        <h3 style="font-size: 15px;font-weight: bold;">Already have an account?</h4>
                    </div>

                    <div class="sign-in">
                        <a class="sign-in-account" href="">
                            <p>Sign in</p>
                        </a>
                    </div>

                 </div>
            </div>
        </div>
    </div>

    <!-- Add New User Form Start-->
    <div class="signup-form">
        <form class="signup-new">
            <div class="form-logo">
                <span class="close-form"><i class="fa fa-times" aria-hidden="true"></i></span>
                <img src="image\logo.svg" alt="No logo" style="width: 10%;">
            </div>
            <h2 style="font-size: 20px;font-weight: bold;">Create your account</h2>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter Name" aria-label="name" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Enter Password" aria-label="password" aria-describedby="basic-addon1">
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label>Date of birth:</label>
                <input type="date" class="form-control">
                <span>This will not be shown publicly. Confirm your own age, even if this account is for a business, a pet, or something else.</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Sign-In Popup -->
    <div class="signin-form">
        <div class="signin-popup">
            <span class="close-signin"><i class="fa fa-times"></i></span>
            <h2>Sign in to X</h2>
            <button class="google-btn"><img src="image\google_logo.png" alt="No G-logo"> Sign in with Google</button>
            <button class="apple-btn"><i class="fa fa-apple"></i> Sign in with Apple</button>
            <div class="or-line"><hr><span>or</span><hr></div>
            <input type="text" class="form-control" placeholder="Phone, email, or username">
            <button class="btn btn-primary full-btn">Next</button>
            <button class="btn btn-light full-btn">Forgot password?</button>
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
        
    <!-- footer links -->
    <footer>
        <div class="footer-links">
            <p><a href="">About</a> |
                <a href="">Download the X app</a> |
                <a href="">Grok</a> |
                <a href="">Help Center</a> |
                <a href="">Terms of Service</a> | 
                <a href="">Privacy Policy</a> |
                <a href="">Cookie Policy</a> |
                <a href="">Accessibility</a> |
                <a href="">Ads info</a> |
                <a href="">Blog</a> |
                <a href="">Careers</a>|
                <a href="">Brand Resources</a> |
                <a href="">Advertising</a> |
                <a href="">Marketing</a> |
                <a href="">X for Business</a> |
                <a href="">Developers</a> |
                <a href="">Directory</a> |
                <a href="">Settings</a> |
                <span>© 2025 X Corp</span>
            </p> 
        </div>
    </footer>
</body>
</html>