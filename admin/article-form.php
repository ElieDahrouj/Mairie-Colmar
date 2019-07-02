<?php
require_once ('./tools-admin/db-admin.php');

if(isset($_POST['save'])) {
    if (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at']) && empty($_POST['videoArticle'])) {
        if (!$_FILES['picture']['error'] == 4) {
            $date = date_parse($_POST['published_at']);
            if (checkdate($date['month'], $date['day'], $date['year'])) {
                $allowed_extensions = ['jpg', 'jpeg', 'gif ', 'png'];
                $my_file_extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                if (in_array($my_file_extension, $allowed_extensions)) {
                    do {
                        $new_file_name = rand();
                        $destination = '../assets/images/articles/' . $new_file_name . '.' . $my_file_extension;
                        $new_file_name_extension = $new_file_name . '.' . $my_file_extension;

                    } while (file_exists($destination));
                    $result = move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

                    $query = $db->prepare('INSERT INTO article (title, content, summary, is_published, published_at, image) VALUES (?, ?, ?, ?, ?, ?)');
                    $newArticle = $query->execute([
                        ucfirst($_POST['title']),
                        ucfirst($_POST['content']),
                        ucfirst($_POST['summary']),
                        $_POST['is_published'],
                        $_POST['published_at'],
                        $new_file_name_extension
                    ]);

                    if ($newArticle) {
                        header('location:article-list.php');
                        exit;
                    } else {
                        $message = "Impossible d'enregistrer le nouvel article...";
                    }
                } else {
                    $message = "Le format de l'image est invalide";
                }
            } else {
                $message = "Date de format incorrect";
            }
        }
        else{
            $message = "veuillez insérer une image";
        }
    }
    elseif (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at']) && !empty($_POST['videoArticle'])) {
        if (!$_FILES['picture']['error'] == 4) {
            $date = date_parse($_POST['published_at']);
            if (checkdate($date['month'], $date['day'], $date['year'])) {
                if (filter_input(INPUT_POST, 'videoArticle', FILTER_VALIDATE_URL)) {
                    $allowed_extensions = ['jpg', 'jpeg', 'gif ', 'png'];
                    $my_file_extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                    if (in_array($my_file_extension, $allowed_extensions)) {
                        do {
                            $new_file_name = rand();
                            $destination = '../assets/images/articles/' . $new_file_name . '.' . $my_file_extension;
                            $new_file_name_extension = $new_file_name . '.' . $my_file_extension;

                        } while (file_exists($destination));
                        $result = move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

                        $query = $db->prepare('INSERT INTO article (title, content, summary, is_published, published_at, image, video) VALUES (?, ?, ?, ?, ?, ?, ?)');
                        $newArticleVideo = $query->execute([
                            ucfirst($_POST['title']),
                            ucfirst($_POST['content']),
                            ucfirst($_POST['summary']),
                            $_POST['is_published'],
                            $_POST['published_at'],
                            $new_file_name_extension,
                            $_POST['videoArticle']
                        ]);

                        if ($newArticleVideo) {
                            header('location:article-list.php');
                            exit;
                        } else {
                            $message = "Impossible d'enregistrer le nouvel article...";
                        }
                    } else {
                        $message = "Le format de l'image est invalide";
                    }
                }
                else{
                    $message = "L'information saisie n'est pas une url";
                }
            }
            else {
                $message = "Date de format incorrect";
            }
        }
        else {
            $message = "veuillez insérer une image";
        }
    }
    else{
        $message = "Les champs ayant ce symbole * sont obligatoire à remplir ";
    }
}

if(isset($_POST['update'])){
    if ($_FILES['picture']['error'] == 4 && empty($_POST['videoArticle']) && !empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at'])) {
        $date = date_parse($_POST['published_at']);
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            $query = $db->prepare('UPDATE article SET
            title = :title,
            content = :content,
            summary = :summary,
            is_published = :is_published,
            published_at = :published_at,
            video = :video
            WHERE id = :id');

            $resultArticle = $query->execute([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'summary' => $_POST['summary'],
                'is_published' => $_POST['is_published'],
                'published_at' => $_POST['published_at'],
                'video' => $_POST['videoArticle'],
                'id' => $_POST['id'],
            ]);

            if ($resultArticle) {
                header('location:article-list.php');
                exit;
            } else {
                $message = 'Erreur.';
            }
        }
        else{
            $message = "Date de format incorrect";
        }
    }
    elseif ($_FILES['picture']['error'] == 4 && !empty($_POST['videoArticle']) && !empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at'])) {
        $date = date_parse($_POST['published_at']);
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            if (filter_input(INPUT_POST, 'videoArticle', FILTER_VALIDATE_URL)) {
                $query = $db->prepare('UPDATE article SET
                title = :title,
                content = :content,
                summary = :summary,
                is_published = :is_published,
                published_at = :published_at,
                video = :video
                WHERE id = :id');

                $resultArticle = $query->execute([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'summary' => $_POST['summary'],
                    'is_published' => $_POST['is_published'],
                    'published_at' => $_POST['published_at'],
                    'video' => $_POST['videoArticle'],
                    'id' => $_POST['id'],
                ]);

                if ($resultArticle) {
                    header('location:article-list.php');
                    exit;
                } else {
                    $message = 'Erreur.';
                }
            }
            else{
                $message = "L'information saisie n'est pas une url";
            }
        }
        else {
            $message = "Date de format incorrect";
        }
    }
    elseif(!$_FILES['picture']['error'] == 4 && empty($_POST['videoArticle']) && !empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at'])) {
        $date = date_parse($_POST['published_at']);
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'gif ', 'png'];
            $my_file_extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

            if (in_array($my_file_extension, $allowed_extensions)) {
                $queryImage = $db->prepare('SELECT image FROM article WHERE id = ?');
                $queryImage->execute([
                    $_POST['id']
                ]);
                $delImage = $queryImage->fetch();

                $destination = '../assets/images/articles/';
                unlink($destination . $delImage['image']);

                do {
                    $new_file_name = rand();
                    $destination = '../assets/images/articles/' . $new_file_name . '.' . $my_file_extension;
                    $new_file_name_extension = $new_file_name . '.' . $my_file_extension;

                } while (file_exists($destination));
                $result = move_uploaded_file($_FILES['picture']['tmp_name'], $destination);


                $query = $db->prepare('UPDATE article SET
                title = :title,
                content = :content,
                summary = :summary,
                is_published = :is_published,
                published_at = :published_at,
                image = :image,
                video = :video
                WHERE id = :id');

                $resultArticle = $query->execute([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'summary' => $_POST['summary'],
                    'is_published' => $_POST['is_published'],
                    'published_at' => $_POST['published_at'],
                    'image' => $new_file_name_extension,
                    'video' => $_POST['videoArticle'],
                    'id' => $_POST['id']
                ]);

                if ($resultArticle) {
                    header('location:article-list.php');
                    exit;
                } else {
                    $message = 'Erreur.';
                }
            }
            else{
                $message = "Format de l'image incorrect";
            }
        }
        else {
            $message = "Date de format incorrect";
        }
    }
    elseif(!$_FILES['picture']['error'] == 4 && !empty($_POST['videoArticle']) && !empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content']) && !empty($_POST['published_at'])) {
        $date = date_parse($_POST['published_at']);
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'gif ', 'png'];
            $my_file_extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

            if (in_array($my_file_extension, $allowed_extensions)) {
                $queryImage = $db->prepare('SELECT image FROM article WHERE id = ?');
                $queryImage->execute([
                    $_POST['id']
                ]);
                $delImage = $queryImage->fetch();

                $destination = '../assets/images/articles/';
                unlink($destination . $delImage['image']);

                do {
                    $new_file_name = rand();
                    $destination = '../assets/images/articles/' . $new_file_name . '.' . $my_file_extension;
                    $new_file_name_extension = $new_file_name . '.' . $my_file_extension;

                } while (file_exists($destination));
                $result = move_uploaded_file($_FILES['picture']['tmp_name'], $destination);


                $query = $db->prepare('UPDATE article SET
                title = :title,
                content = :content,
                summary = :summary,
                is_published = :is_published,
                published_at = :published_at,
                video = :video,
                image = :image
                WHERE id = :id');

                $resultArticle = $query->execute([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'summary' => $_POST['summary'],
                    'is_published' => $_POST['is_published'],
                    'published_at' => $_POST['published_at'],
                    'video' => $_POST['videoArticle'],
                    'image' => $new_file_name_extension,
                    'id' => $_POST['id']
                ]);

                if ($resultArticle) {
                    header('location:article-list.php');
                    exit;
                } else {
                    $message = 'Erreur.';
                }
            }
            else{
                $message = "Format de l'image incorrect";
            }
        }
        else {
            $message = "Date de format incorrect";
        }
    }
    else{
        $message = "Les champs ayant ce symbole * sont obligatoire à remplir pour mettre à jour";
    }
}

if(isset($_GET['article_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
	$query = $db->prepare('SELECT * FROM article WHERE id = ?');
	$query->execute(array($_GET['article_id']));
	$article = $query->fetch();

	if($article == false){
        header('location:article-list.php');
        exit;
    }
}
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
					<header class="pb-3">
						<h4><?php if(isset($article)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un article</h4>
					</header>

					<?php if(isset($message)):?>
                        <div class="bg-danger text-white">
                            <?= $message; ?>
                        </div>
					<?php endif; ?>

					<form action="article-form.php" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="title">Titre : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($article) ? htmlentities($article['title']) : '';?>" type="text" placeholder="Titre" name="title" id="title" />
						</div>
						<div class="form-group">
							<label for="summary">Résumé : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($article) ? htmlentities($article['summary']) : '';?>" type="text" placeholder="Résumé" name="summary" id="summary" />
						</div>
						<div class="form-group">
							<label for="content">Contenu : <b class="text-danger">*</b></label>
							<textarea class="form-control" name="content" id="content" placeholder="Contenu"><?= isset($article) ? htmlentities($article['content']) : '';?></textarea>
						</div>

                        <div class="form-group">
                            <label for="video">Pour des raisons de poids veuillez renseigner un URL :</label>
                            <input class="form-control" value="<?= isset($article) ? $article['video'] : '';?>" type="url" placeholder="Video" name="videoArticle" id="video" />
                        </div>

                        <div class="form-group">
                            <label for="image">Images : <b class="text-danger">*</b></label>
                            <input class="form-control" type="file" id="image" name="picture">

                            <?php if(isset($article['image'])) :?>
                                <img class="img-fluid py-4" src="../assets/images/articles/<?= $article['image']; ?>" alt="">
                            <?php endif; ?>
                        </div>

						<div class="form-group">
							<label for="published_at">Date de publication : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($article) ? htmlentities($article['published_at']) : '';?>" type="date" placeholder="Résumé" name="published_at" id="published_at" />
						</div>

						<div class="form-group">
							<label for="is_published">Publié ? <b class="text-danger">*</b></label>
							<select class="form-control" name="is_published" id="is_published">
								<option value="0" <?= isset($article) && $article['is_published'] == 0 ? 'selected' : '';?>>Non</option>
								<option value="1" <?= isset($article) && $article['is_published'] == 1 ? 'selected' : '';?>>Oui</option>
							</select>
						</div>

						<div class="text-right">
                            <?php if(isset($article)): ?>
                                <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                            <?php else: ?>
                                <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                            <?php endif; ?>
						</div>

						<?php if(isset($article)): ?>
						    <input type="hidden" name="id" value="<?= $article['id']; ?>" />
						<?php endif; ?>
					</form>
				</section>
			</div>
		</div>
  </body>
</html>
