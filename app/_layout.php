<!doctype html>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
?>
<html lang="<?php _r('lang'); ?>">
<head>
	<?php require_once($_->raiz.'/app/partials/head.php'); ?>
</head>
<body class="page-<?php _r('folder'); ?> <?php _r('bodyClass'); ?>">
	
	<header>
		<?php require_once($_->raiz.'/app/partials/header.php'); ?>
	</header>

	<div class="container main-container">
		<?php require_once($_->container); ?>
	</div>

	<footer>
		<?php require_once($_->raiz.'/app/partials/footer.php'); ?>
	</footer>

	<?php require_once($_->raiz.'/app/partials/scripts.php'); ?>
</body>
</html>