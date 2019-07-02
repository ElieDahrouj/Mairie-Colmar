<?php
require_once ('./tools-admin/db-admin.php');

if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

	$query = $db->prepare('DELETE FROM user WHERE id = ?');
	$result = $query->execute([
		$_GET['user_id']
	]);

    $queryFactures = $db->prepare('SELECT * FROM factures WHERE user_id = ?');
    $queryFactures->execute([
        $_GET['user_id']
    ]);
    $delImageFactures = $queryFactures->fetchAll();

    if (count($delImageFactures) >0){
        $destination = '../assets/factures clients/';

        foreach ($delImageFactures as $facturesDeleted){
            unlink($destination . $facturesDeleted['name']);
        }

        $queryDeleteImages = $db->prepare('DELETE FROM factures WHERE user_id = ?');
        $queryDeleteImages->execute([
            $_GET['user_id']
        ]);
    }

	if($result){
		$message = "Suppression efféctuée.";
	}
	else{
		$message = "Impossible de supprimer la séléction.";
	}
}

$query = $db->query('SELECT * FROM user ORDER BY id DESC');
$users = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des utilisateurs</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
			<?php require 'partials/header.php'; ?>
			<div class="row my-3 index-content">
				<?php require 'partials/nav.php'; ?>
				<section class="col-9">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des utilisateurs</h4>
						<a class="btn btn-primary" href="user-form.php">Ajouter un utilisateur</a>
					</header>
					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-success text-white p-2 mb-4">
						<?= $message; ?>
					</div>
					<?php endif; ?>
					<?php if($users): ?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Admin</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($users as $user): ?>
							<tr>
								<!-- htmlentities sert à écrire les balises html sans les interpréter -->
								<th><?= htmlentities($user['id']); ?></th>
								<td><?= htmlentities($user['firstname']); ?></td>
								<td><?= htmlentities($user['lastname']); ?></td>
								<td><?= htmlentities($user['email']); ?></td>
								<td><?= $user['is_admin'] == 1 ? 'Oui' : 'Non' ?></td>
								<td>
									<a href="user-form.php?user_id=<?= $user['id']; ?>&action=edit" class="btn btn-warning">Modifier</a>
									<a onclick="return confirm('Are you sure?')" href="user-list.php?user_id=<?= $user['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php else: ?>
						Aucun utilisateur enregistré.
					<?php endif; ?>
				</section>
			</div>
		</div>
	</body>
</html>
