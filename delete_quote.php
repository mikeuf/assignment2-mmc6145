<?php

// View quotes in the database
include('templates/header.php');

echo "<h2>Delete a Quote</h2>";

// Deny access if user is not administrator
if (!isAdministrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
include('templates/footer.php');
exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ){
  $query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";

      // Get quote from database
  if ($result = mysqli_query($dbc,$query)) {
    // Display quote
    $row = mysqli_fetch_array($result);

echo '<form action="delete_quote.php" method="post">
<p>Are you sure that you want to delete this quote?</p>
<div></blockquote' . $row['quote'] . '</blockquote>- ' . $row['source'];

    // Is this a favorite?
    if($row['favorite'] == 1) {
      echo "<strong>Favorite!</strong>";
    }

echo '</div><input type="hidden" name="id" value="' . $_GET['id'] . '">
      <p><input type="submit" name="submit" value="Delete Quote"></p>
    </form>';
    
  } else {
    echo "<p>Could not retrieve the blog entry because:" . mysqli_error($dbc) . "</p>";
    echo "<p>The query being run was: " . $query . "</p>";
  }

} else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {

$query = "DELETE FROM quotes WHERE id={$_POST['id']} LIMIT 1";

    // if at least one row is affected
    if(mysqli_affected_rows($dbc) == 1) {
      echo "<p>Quote deleted.</p>";
    } else {
      echo "<p class='error'>Error occured while deleting the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
  } else {
    echo "<p class='error'>Page accessed in error!</p>";
  }
  
    mysqli_close($dbc);

    include('templates/footer.php'); 
    ?>