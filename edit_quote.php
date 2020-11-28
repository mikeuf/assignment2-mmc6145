<?php

// View quotes in the database
include('templates/header.php');

echo "<h2>Edit a Quote</h2>";

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

    // Display form
echo '<form action="edit_quote.php" method="post">
      <p><label>Quote <textarea name="quote" rows="5" cols="30">' . htmlentities($row['quote']) . '</textarea></label></p>
      <p><label>Source <input type="text" name="source" value="' . htmlentities($row['source']) . '"></label></p>
      <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"';
    
    // Is this a favorite?
    if ($row['favorite'] == 1) {
      echo ' checked="checked"';
    }

    // Close form
    echo '></label></p>
    <input type="hidden" name="id" value="' . $_GET['id'] . '">
    <p><input type="submit" name="submit" value="Update Quote"></p>
    </form>';

  } else {
    echo "<p>Could not retrieve the blog entry because:" . mysqli_error($dbc) . "</p>";
    echo "<p>The query being run was: " . $query . "</p>";
  }

} else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
  $problem = FALSE;
  
  if (!empty($_POST['quote']) && !empty($_POST['source'])) {
    $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
    $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

    if (isset($_POST['favorite'])) {
      $favorite = 1;
    } else {
      $favorite = 0;
    }
  } else {
    echo "<p class='error'>Add a quote and a source!</p>";
    $problem = TRUE;
  }

  if (!$problem) {
  $query = "UPDATE quotes SET quote='$quote', source='$source', favorite=$favorite WHERE id={$_POST['id']}";

  if ($result = mysqli_query($dbc,$query)) {
    echo "<p>Successfully updated the quote!</p>";
  } else {
      echo "<p class='error'>Error occured while adding the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
  }
  } else {
    echo "<p class='error'>Page was accessed in error.</p>";
  }

      mysqli_close($dbc);

    include('templates/footer.php'); 
    ?>
