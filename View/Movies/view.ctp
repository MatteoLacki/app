<h1><?php echo h($movie['Movie']['title']); ?></h1>

<p><small>Created: 	<?php echo $movie['Movie']['created']; ?></small></p>
<!-- <p><small>Produced: <?php echo $movie['Movie']['year_of_production']; ?></small></p>
<p><small>Directed: <?php echo $movie['Movie']['director']; ?></small></p>
<p><small>Genre: 	<?php echo $movie['Movie']['genre']; ?></small></p> -->
<!-- <p><small>Runtime: 	<?php echo $movie['Movie']['runtime']; ?></small></p> -->

<p><?php echo h($movie['Movie']['description']); ?></p>