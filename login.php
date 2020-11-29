<?php
/**
 * login.php
 *
 * Allow users to log in to the quotes site
 */

// Initialize login state to false
$loggedin = false;
$error = false;

// Is the form submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Handle the form
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if ((strtolower($_POST['email']) == 'mblack101@ufl.edu') && ($_POST['password'] == 'YouShallNotPassword')) {
      // Add cookie
      setcookie('Mike', 'Black', time() + 3600);
      $loggedin = true;
    } else {
      $error = "<p>The email and password you entered are either incorrect or don't exist.</p>";
    }
  } else {
    $error = "<p>You must add both an email and a password.</p>";
  }
}

// Insert header
include ('templates/header.php');

// If an error occurs, display a message to the user
if ($error) {
  echo "<p class=\"error\">$error</p>";
}

// Display whether user is logged in or display the form
if ($loggedin) {
  echo "<p>Login successful.</p>";
} else {
echo '<div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Login</h2>
    <p>Add your email address and password.</p>
<!-- Quote submission form -->
    <form>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> <!-- End row -->
</div> <!-- End container -->';
}

// Insert footer
include ('templates/footer.php');
?>
