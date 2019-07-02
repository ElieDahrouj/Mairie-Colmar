<?php

require_once ('./tools-admin/db-admin.php');

if(isset($_GET['article_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
    $queryImage = $db->prepare('SELECT image FROM article WHERE id = ?');
    $queryImage->execute([
        $_GET['article_id']
    ]);
    $delImage = $queryImage->fetch();

    if (!empty($delImage['image'])) {
        $destination = '../assets/images/articles/';
        unlink($destination . $delImage['image']);
    }

	$query = $db->prepare('DELETE FROM article WHERE id = ?');
	$result = $query->execute([
		$_GET['article_id']
	]);

    $queryImageSecondary = $db->prepare('SELECT * FROM image WHERE article_id = ?');
    $queryImageSecondary->execute([
        $_GET['article_id']
    ]);
    $delImageSecondary = $queryImageSecondary->fetchAll();

    if (count($delImageSecondary) >0){
        $destinationSecondaryPicture = '../assets/images/imagesSecondaire/';

        foreach ($delImageSecondary as $secondary){
            unlink($destinationSecondaryPicture . $secondary['name']);
        }

        $queryDeleteImages = $db->prepare('DELETE FROM image WHERE article_id = ?');
        $queryDeleteImages->execute([
            $_GET['article_id']
        ]);
    }

	if($result){
		$message = "Suppression efféctuée.";
	}
	else{
		$message = "Impossible de supprimer la séléction.";
	}
}

$query = $db->query('SELECT * FROM article ORDER BY id DESC');
$articles = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des articles</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
			<?php require 'partials/header.php'; ?>
			<div class="row my-3 index-content">
				<?php require 'partials/nav.php'; ?>
				<section class="col-9">

					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des articles</h4>
						<a class="btn btn-primary" href="article-form.php">Ajouter un article</a>
					</header>

					<?php if(isset($message)):?>
                        <div class="bg-success text-white p-2 mb-4">
                            <?= $message; ?>
                        </div>
					<?php endif; ?>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Titre</th>
								<th>Publié</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($articles) > 0): ?>
                                <?php foreach($articles as $article): ?>
                                <tr>
                                    <th><?= htmlentities($article['id']); ?></th>
                                    <td><?= htmlentities($article['title']); ?></td>
                                    <td>
                                        <?= $article['is_published'] == 1 ? 'Oui' : 'Non' ?>
                                    </td>
                                    <td>
                                        <a href="article-form.php?article_id=<?= $article['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
                                        <a onclick="return confirm('Are you sure?')" href="article-list.php?article_id=<?= $article['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
							<?php else: ?>
								Aucun article enregistré.
							<?php endif; ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</body>
</html>
