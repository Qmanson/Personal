<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quincy's Home Base</title>
  <link rel="stylesheet" href="style.css">
  <script src="effects.js"></script>
</head>
<body>
  <header>
    <h1>Quincy's Home Base</h1>
    <nav>
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="notes.php">Notes</a></li>
        <li><a href="resources.php">Resources</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Welcome to Quincy's Home Base</h2>

  <?php
	echo "<p>Today is " . date("Y-m-d") . ".</p>";
        $dir = "gifs/";
        $files = scandir($dir);
	echo "<div class='gifs'>";
        foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
			echo "<div class='gif'>";
                        echo "<img src='$dir$file'/>";
			echo "</div>";
                }
        }
	echo "</div>"
    ?>

  </main>
  <footer>
	2023 Quincy's Page 
  </footer>
</body>
</html>
