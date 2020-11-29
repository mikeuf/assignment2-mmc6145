<?php
/**
 * add_quote.php
 * Enable users to add quotes to the database
 *
 */

// Insert header
 include ('templates/header.php');

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
<div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Add a quote</h2>
    <p>Submit a famous quote and include its source. Select <b>Favorite</b> if this is a favorite quote.</p>
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
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="favorite">
    <label class="form-check-label" for="favorite">Favorite</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> <!-- End row -->
</div> <!-- End container -->

<!-- Insert footer -->
<?php include ('templates/footer.php'); ?>
