<?php 

/*
  Template Name: Users
*/
  get_header();
?>

<div class="users container">

    <div class="img">
    <img src="<?php echo get_template_directory_uri()."/img/about-logo.png" ?>">
    </div>


    <div class="Login">
    <h1>Login</h1>
    <form id="Login" action="">
        <label for="">Email:</label>
        <input type="email" name="emailLogUser" placeholer="Email">
        <br><br>
        <label for="">Password:</label>
        <input type="password" name="passLogUser" placeholder="Password">
        <br><br>
        <div class="loged">
        
        </div>
        <button type="submit" class="users-btn">
            Log in
        </button>
    </form>
    </div>

    <div class="SignUp">
    <h1>Signup</h1>
    <form id="signup">
        <label for="">Name:</label>
        <input type="text" name="nameUser" placeholder="Name">
        <br><br>
        <label for="">Email:</label>
        <input type="email" name="emailUser" placeholder="User">
        <br><br>
        <label for="">phone:</label>
        <input type="tel" name="phoneUser" placeholder="User">
        <br><br>
        <label for="">Password:</label>
        <input type="password" name="passUser" placeholder="Password">
        <br><br>
        <label for="">Repeat Password:</label>
        <input type="password" name="rep_pass" placeholder="Repeat Password">
        <br><br>
        <div class="complete">
        
        </div>
        <button type="submit" class="users-btn">
            Sign Up
        </button>
       
    </form>
    </div>

</div>

<?php get_footer(); ?>