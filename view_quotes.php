<?php

// View quotes in the database
include('templates/header.php');

echo '<main>
<div class="container-fluid"><div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>View Quotes</h2>';

// Deny access if user is not administrator
if (!is_administrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
include('templates/footer.php');
exit();
}

      // Get quote entries from database
      $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';
      if ($result = mysqli_query($dbc, $query)) {
        // Print quote
        echo "<ul class=\"list-group list-group-flush\">";
        while ($row = mysqli_fetch_array($result)) {
          echo "<li class=\"list-group-item\">
          <blockquote>{$row['quote']}</blockquote>{$row['source']}";
            
    // Is this a favorite?
    if($row['favorite'] == 1) {
      echo "<p><strong>You have great taste!</strong></p>";
    }

echo "<p class=\"small text-muted\">Admin Menu: <a href=\"edit_quote.php?id={$row['id']}\">Edit | </a>
<a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p></li>";
  }
    echo "</ul>";
} else {
  echo "<p class=\"error\">Could not retrieve the data because: " . mysqli_error($dbc) . "</p>";
  echo "<p>The query being run was: " . $query . "</p>";
}
      mysqli_close($dbc);

echo '</div> <!-- End column -->
      </div> <!-- End row -->
      </div> <!-- End container -->
      </main>';

    include('templates/footer.php'); 
    ?>
