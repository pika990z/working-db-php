<?php
include("connection.php");
include("sessions.php");

// if the request method is a POST request and the post request contains "submit"
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){ //if the request method is POST and it contains "submit"
  $fullname=trim($POST['name']); // takes full name
  $email=trim($POST['email']);
  $password=trim($_POST['password']);
  $confirm_password=trim($_POST['confirm_password']);
  $password_hash=password_hash($password,PASSWORD_BCRYPT);

// checks if the query is prepared to be send to the database ?
  if($query = $db->prepare("select * from users where email = ?")){ //does this connect?
    $error='';
    //bind paremeters (s = string, i=int, b=blob, etc), in our case the username is a string, we use "s"
    $query->bind_param('s',$email);
    $query->execute();
    // store the result so we can check if the account exists in the database
    $query->store_result();
    if($query->num_rows>0){
      $error .= '<p class="error">The email address is already registered!</p>';
    }else{
      // validate password
      if(strlen($password) <6 ){
        $error .= '<p class="error">Password must have atleast 6 characters</p>';
      }
      // validate confirm password
      if(empty($confirm_password)){
        $error .= '<p class="error">Please enter confirm password.</p>';
      }else{
        if(empty($error) && ($password != $confirm_password)){
          $error .= '<p class="error">Password do not match.</p>';
        }
      }
      //no errors in regards to users or passwords
      if(empty($error)){
        // this prepares to insert the values into the database;
        $insertQuery = $db->prepare("insert into users (name,email,password) values (?,?,?);"); // not really sure what the tail end does
        $insertQuery = $db->bind_param("sss",$fullname,$email,$password_hash);
        $result=$insertQuery->execute();
        if($result){
          $error .= '<p class="success">Your registration was successful!</p>';
        }else{
          $error .='<p class="error"Something went wrong!</p>';
        }
      }
    }
  }
  $query->close();
  $insertQuery->close();
  mysqli_close($db);
}
?>
<DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Sing Up</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Register</h2>
            <p>Please fill out this form to create an account.</p>
            <?php echo $success; ?>
            <?php echo $error; ?>
            <form action="" method="post">
              <div class="form-group">
                <label>Full Name</label>
                <input type-"text" name="name" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Email Address </label>
                <input type="email" name="email" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class-"form-control" required/>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              </div>
              <p>Already have an account? <a href="login.php">Login Here!</a>.</p>
            </form>
          </div>
        </div>
      </div>
    </body>
  </html>
