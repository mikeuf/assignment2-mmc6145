<?php
/**
 * add_quote.php
 * Enable users to add quotes to the database
 *
 */

// Insert header
 include ('templates/header.php');

echo "<h2>Add a Quote</h2>";

// Deny access if user is not administrator
if (!isAdministrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
  include ('templates/footer.php');
  exit();
}

// Handle form 
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Check that the user added both the quote and the source
  if (!empty($_POST['quote']) && !empty($_POST['source'])) {
    $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
    $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

    // Record if user indicates that this is a favorite quote
    if (isset($_POST['favorite'])) {
      $favorite = 1;
    } else {
      $favorite = 0;
    }
    
    // Insert user submission into database
    $query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quotes', '$source', $favorite)";
    mysqli_query($dbc, $query);

    // Was a row in the database actually modified?
    if (mysqli_affected_rows($dbc) == 1) {
      echo "<p>Quote added.</p>";
    } else {
      echo "<p class=\"error\">An error occured while adding the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
    mysqli_close($dbc);
  }
  else {
    echo "<p class=\"error\">You must add both a quote and its source.</p>";
  }
}
?>

<!-- Quote submission form -->
<form action="add_quote.php" method="post">
      <p><label>Quote <textarea name="quote" rows="5" cols="30"></textarea></label></p>
      <p><label>Source <input type="text" name="source"></label></p>
      <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"></label></p>
      <input type="submit" name="submit" value="Submit Quote"></p>
    </form>

<!-- Insert footer -->
<?php include ('templates/footer.php'); ?>
