<?php
// Add quotes to the database
include('templates/header.php');

echo "<h2>Add Quote</h2>";

// Deny access if user is not administrator
if (!isAdministrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
include('templates/footer.php');
exit();
}
// Verify quote and source are not empty, method is POST, and store the values
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (!empty($_POST['quote']) && !empty($_POST['source'])) {
    $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
    $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

    // Create favorite value
    if(isset($_POST['favorite'])) {
      $favorite = 1;
    } else {
      $favorite = 0;
    } 
    $query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quotes', $source', $favorite)";
    
    // if at least one row is affected
    if(mysqli_affected_rows($dbc) == 1) {
      echo "<p>Quote added.</p>";
    } else {
      echo "<p class='error'>Error occured while adding the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
    mysqli_close($dbc);
  } else {
    echo "<p class='error'>Add a quote and a source!</p>";
  }
    }
?>

<form action="add_quote.php" method="post">
      <p><label>Quote <textarea name="quote" rows="5" cols="30"></textarea></label></p>
      <p><label>Source <input type="text" name="source"></label></p>
      <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"></label></p>
      <input type="submit" name="submit" value="Submit Quote"></p>
    </form>

    <?php include('templates/footer.php'); ?>