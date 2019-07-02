<?php
	$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();

	$nbCategories = $db->query("SELECT COUNT(*) FROM category_faq")->fetchColumn();

	$nbArticles = $db->query("SELECT COUNT(*) FROM article")->fetchColumn();

    $nbQuestAns = $db->query("SELECT COUNT(*) FROM faq")->fetchColumn();

    $nbFactures = $db->query("SELECT COUNT(*) FROM factures")->fetchColumn();

    $nbPicturesSecondary = $db->query("SELECT COUNT(*) FROM image")->fetchColumn();
?>
<nav class="col-3 py-2 categories-nav">
	<a class="d-block btn btn-warning mb-4 mt-2" href="../index.php?page=user-page">Site</a>
	<ul>
		<li><a href="user-list.php">Gestion des utilisateurs (<?= $nbUsers; ?>)</a></li>
		<li><a href="article-list.php">Gestion des articles (<?= $nbArticles; ?>)</a></li>
        <li><a href="secondaryPicture-list.php">Gestion des images secondaire (<?= $nbPicturesSecondary; ?>)</a></li>
        <li><a href="category-list.php">Gestion des catégories faq (<?php echo $nbCategories; ?>)</a></li>
        <li><a href="faq-list.php">Gestion des faqs (<?= $nbQuestAns; ?>)</a></li>
        <li><a href="factures-list.php">Gestion des factures (<?= $nbFactures; ?>)</a></li>
	</ul>
</nav>
