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

		<div class="folders-container">
			<?php
				$dirs = array('Holga 120N', 'Konica Autoreflex TC', 'Lomography ActionSampler', 'Lomography Fisheye 2', 'Other');

				for ($i = 0; $i < count($dirs); $i++) {
					$dir = "photos/" . $dirs[$i];
					$files = scandir($dir);
				
					// display a button for the folder
					echo "<button class='folder-button' data-folder='$dir'>" . $dirs[$i] . "</button>";
				
					// create a div to display the photos
					echo "<div class='photo-container' id='photos-$dir' style='display: none'>";
				
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
		<div class="large-image-container">
				<img class="large-image" src=""></img>
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
					button.style.color = "#fff";
					button.style.backgroundColor = "#3c4043";
				} else {
					photoDiv.style.display = 'none';
					button.style.color = "#3c4043";
					button.style.backgroundColor = "#fff";
				}
			});
		});

		const gallery = document.querySelector('.folders-container');
		const largerImageContainer = document.querySelector('.large-image-container');
		const largerImage = document.querySelector('.large-image');
		const body = document.querySelector('body');

		gallery.addEventListener('click', (event) => {
			console.log("Check");
			console.log(event.target.tagName);
		if (event.target.tagName === 'IMG') {
			largerImage.setAttribute('src', event.target.getAttribute('src'));
			largerImageContainer.style.display = 'block';
			body.classList.add('dimmed');
		}
		});

		largerImageContainer.addEventListener('click', (event) => {
		if (event.target === largerImageContainer) {
			largerImageContainer.style.display = 'none';
			body.classList.remove('dimmed');
		}
		});
	</script>
	  <footer>
	2023 Quincy's Page 
  </footer>
</body>
</html>
