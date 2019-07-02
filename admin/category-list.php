<?php
require_once ('./tools-admin/db-admin.php');

if(isset($_GET['category_id_faq']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

	$query = $db->prepare('DELETE FROM category_faq WHERE id = ?');
	$result = $query->execute([
		$_GET['category_id_faq']
	]);

	if($result){
		$message = "Suppression efféctuée.";
        $query = $db->prepare('DELETE FROM faq WHERE categorie_id = ?');
        $result = $query->execute([
            $_GET['category_id_faq']
        ]);
	}
	else{
		$message = "Impossible de supprimer la séléction.";
	}
}


$query = $db->query('SELECT * FROM category_faq ORDER BY id DESC');
$categories = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des catégories</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
			<?php require 'partials/header.php'; ?>
			<div class="row my-3 index-content">
				<?php require 'partials/nav.php'; ?>
				<section class="col-9">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des catégories</h4>
						<a class="btn btn-primary" href="category-form.php">Ajouter une catégorie</a>
					</header>
					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-success text-white p-2 mb-4">
						<?= $message; ?>
					</div>
					<?php endif; ?>
					<table class="table table-striped">
						<thead  class="thead-dark">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if( count($categories) > 0): ?>
                                <?php foreach($categories as $category): ?>
                                <tr>
                                    <th><?= htmlentities($category['id']); ?></th>
                                    <td><?= htmlentities($category['name']); ?></td>
                                    <td>
                                        <a href="category-form.php?category_id_faq=<?= $category['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
                                        <a onclick="return confirm('Are you sure?')" href="category-list.php?category_id_faq=<?= $category['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
							<?php else: ?>
								Aucune catégorie enregistrée.
							<?php endif; ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</body>
</html>
