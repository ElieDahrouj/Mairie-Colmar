<?php
require_once ('./tools-admin/db-admin.php');

$query = $db->query('SELECT * FROM image ORDER BY id DESC');
$imagesSecondary = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration Colmar</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
			<?php require 'partials/header.php'; ?>
			<div class="row my-3 index-content">
				<?php require 'partials/nav.php'; ?>
				<main class="col-9 d-flex" style="flex-wrap: wrap">
                    <?php foreach($imagesSecondary as $secondary): ?>
                        <div class="card mt-3 mr-2" style="width: 18rem;" >
                            <img src="../assets/images/imagesSecondaire/<?= $secondary['name']; ?>" class="card-img-top" style="object-fit: cover; height: 375px" alt="...">
                        </div>
                    <?php endforeach; ?>
				</main>
			</div>
		</div>
	</body>
</html>

