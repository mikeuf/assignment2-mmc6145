<?php

// View quotes in the database
include('templates/header.php');

echo '<main>
<div class="container-fluid"><div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Delete Quote</h2>';

// Deny access if user is not administrator
if (!is_administrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
include('templates/footer.php');
exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)){
  $query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";

      // Get quote from database
  if ($result = mysqli_query($dbc,$query)) {
    // Display quote
    $row = mysqli_fetch_array($result);

echo '<form action="delete_quote.php" method="POST">
<p>Are you sure that you want to delete this quote?</p>
<div></blockquote' . $row['quote'] . '</blockquote>- ' . $row['source'];

    // Is this a favorite?
    if($row['favorite'] == 1) {
      echo "<strong>Favorite!</strong>";
    }

echo '</div><input type="hidden" name="id" value="' . $_GET['id'] . '">
<br /><button type="submit" class="btn">Delete</button>
    </form>';
    
  } else {
    echo "<p>Could not retrieve the blog entry because:" . mysqli_error($dbc) . "</p>";
    echo "<p>The query being run was: " . $query . "</p>";
  }

} else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {

$query = "DELETE FROM quotes WHERE id={$_POST['id']} LIMIT 1";
if ($result = mysqli_query($dbc, $query) && mysqli_affected_rows($dbc) == 1) {
      echo "<p>Quote deleted.</p>";
    } else {
      echo "<p class='error'>Error occured while deleting the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
  } else {
    echo "<p class='error'>Page accessed in error!</p>";
  }
  
    mysqli_close($dbc);

    echo '</div> <!-- End column -->
      </div> <!-- End row -->
      </div> <!-- End container -->
      </main>';

    include('templates/footer.php'); 
    ?>