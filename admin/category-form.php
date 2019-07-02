<?php
require_once ('./tools-admin/db-admin.php');

if(isset($_POST['save'])){
    if (!empty($_POST['name'])) {
        $query = $db->prepare('INSERT INTO category_faq (name) VALUES (?)');
        $newCategory = $query->execute([
            ucfirst($_POST['name']),
        ]);

        if ($newCategory) {
            header('location:category-list.php');
            exit;
        } else {
            $message = "Impossible d'enregistrer la nouvelle categorie...";
        }
    }
    else{
        $message = "Le nom de la categorie est obligatoire";
    }
}

if(isset($_POST['update'])){
    if (!empty($_POST['name'])) {
        $query = $db->prepare('UPDATE category_faq SET
		name = :name
		WHERE id = :id'
        );

        $result = $query->execute([
            'name' => $_POST['name'],
            'id' => $_POST['id']
        ]);

        if ($result) {
            header('location:category-list.php');
            exit;
        } else {
            $message = "Impossible d'enregistrer la nouvelle categorie...";
        }
    }
    else{
        $message = "Impossible d'enregistrer une nouvelle categorie vide";
        $delai=2;
        $url='category-list.php';
        header("Refresh: $delai;url=$url");
    }
}

if(isset($_GET['category_id_faq']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
	$query = $db->prepare('SELECT * FROM category_faq WHERE id = ?');
    $query->execute(array($_GET['category_id_faq']));
	$category = $query->fetch();

	if ($category == false){
        header('location:category-list.php');
        exit;
    }
}
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
					<header class="pb-3">
						<h4><?php if(isset($category)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une catégorie</h4>
					</header>

					<?php if(isset($message)):?>
                        <div class="bg-danger text-white">
                            <?= $message; ?>
                        </div>
					<?php endif; ?>

					<form action="category-form.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Nom :</label>
							<input class="form-control" value="<?= isset($category) ? htmlentities($category['name']) : '';?>" type="text" placeholder="Nom" name="name" id="name" />
						</div>

						<div class="text-right">
							<?php if(isset($category)): ?>
							    <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
							<?php else: ?>
							    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<?php if(isset($category)): ?>
						    <input type="hidden" name="id" value="<?= $category['id']?>" />
						<?php endif; ?>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>
