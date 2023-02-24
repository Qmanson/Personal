<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Photos</title>
	<link rel="stylesheet" href="style.css">
	<script src="effects.js"></script>
</head>
<body>
	<header>
		<h1>Quincy's Photos</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
        			<li><a href="projects.php">Projects</a></li>
        			<li><a href="notes.php">Notes</a></li>
        			<li><a href="resources.php">Resources</a></li>
      			</ul>
    		</nav>
	</header>
	<main>
		<h2>My Photos</h2>

		<button id="zoom-in">+</button>
		<button id="zoom-out">-</button>

		<div class="folders-container">
			<?php
				$dirs = array('Holga 120N', 'Konica Autoreflex TC', 'Lomography ActionSampler', 'Lomography Fisheye 2', 'Other');

				for ($i = 0; $i < count($dirs); $i++) {
					$dir = "photos/" . $dirs[$i];
					$files = scandir($dir);
				
					// display a button for the folder
					echo "<button class='folder-button' data-folder='$dir'>" . $dirs[$i] . "</button>";
				
					// create a div to display the photos
					echo "<div class='photo-container-zoom' id='photos-$dir' style='display: none'>";
				
					// display all photos in the folder
					foreach ($files as $file) {
						if ($file != '.' && $file != '..') {
							echo "<div class='photo'>";
							echo "<img src='$dir/$file' loading='lazy'/>";
							echo "</div>";
						}
					}
				
					// close the div for the photos
					echo "</div>";
				}
			?>
		</div>

	</main>

	<script>
		// add event listeners to the buttons to show/hide photos
		const folderButtons = document.querySelectorAll('.folder-button');

		folderButtons.forEach((button) => {
			button.addEventListener('click', (event) => {
				const folder = event.target.getAttribute('data-folder');
				const photoDiv = document.getElementById(`photos-${folder}`);

				if (photoDiv.style.display === 'none') {
					photoDiv.style.display = 'block';
				} else {
					photoDiv.style.display = 'none';
				}
			});
		});

		// add event listeners to the buttons to update the zoom level
		const zoomInButton = document.getElementById('zoom-in');
		const zoomOutButton = document.getElementById('zoom-out');
		const photos = document.querySelectorAll('img');

		let zoomLevel = 1;

		zoomInButton.addEventListener('click', () => {
		zoomLevel += 0.1;
		photos.forEach((photo) => {
			photo.style.transform = `scale(${zoomLevel})`;
		});
		});

		zoomOutButton.addEventListener('click', () => {
		zoomLevel -= 0.1;
		photos.forEach((photo) => {
			photo.style.transform = `scale(${zoomLevel})`;
		});
		});
	</script>
	  <footer>
	2023 Quincy's Page 
  </footer>
</body>
</html>
