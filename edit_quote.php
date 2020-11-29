<?php

// View quotes in the database
include('templates/header.php');

echo '<main>
<div class="container-fluid"><div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Edit a Quote</h2>';

// Deny access if user is not administrator
if (!is_administrator()) {
  echo "<div class=\"alert alert-primary\" role=\"alert\"><strong>Access Denied: </strong>";
  echo "You do not have permission to access this content.</div>";
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
<div class="form-group">
    <label for="quote">Quote</label>
    <textarea class="form-control" name="quote">' . htmlentities($row['quote']) . '</textarea>
    <label for="source">Source</label>
    <input type="text" class="form-control" name="source" value="' . htmlentities($row['source']) . '"></input>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="favorite" value="yes"';
    
    // Is this a favorite?
    if ($row['favorite'] == 1) {
      echo ' checked="checked"';
    }

    // Close form
    echo '><label class="form-check-label" for="favorite">Favorite</label>
    <input type="hidden" name="id" value="' . $_GET['id'] . '">
    </div>
    <button type="submit" class="btn">Submit</button>
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
  $query = "UPDATE quotes SET quote='$quote', source='$source', favorite='$favorite' WHERE id={$_POST['id']}";

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

echo '</div><!-- End column -->
</div><!-- End row -->
</div><!-- End container -->
</main>';

    include('templates/footer.php'); 
    ?>
