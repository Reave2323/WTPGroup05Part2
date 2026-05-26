<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='job-listing'>";
    echo "<h2>" . htmlspecialchars($row['job_name']) . "</h2>";
    echo "<p>" . htmlspecialchars($row['job_description']) . "</p>";
    echo "</div>";
}



?>