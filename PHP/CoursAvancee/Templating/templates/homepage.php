<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
	<div class="news">
    	<h3>
        	<?= htmlspecialchars($post['title']); ?>
        	<em>le <?= $post['french_creation_date']; ?></em>
    	</h3>
    	<p>
        	<?= nl2br(htmlspecialchars($post['content'])); ?>
        	<br />
        	<em><a href="post.php?id=<?= urlencode($post['identifier']) ?>">Commentaires</a></em>
    	</p>
	</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>