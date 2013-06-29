<h1><?php echo h($movie['Movie']['title']); ?></h1>

<p><small>Rok produkcji: 	<?php echo $movie['Movie']['year']; ?></small></p>
<p><small>Reżyseria:	 	<?php echo $movie['Movie']['register']; ?></small></p>
<p><small>Minuty: 			<?php echo $movie['Movie']['runtime']; ?></small></p> 

<p><?php echo h($movie['Movie']['description']); ?></p>