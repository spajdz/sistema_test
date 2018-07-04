<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Administración</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?= $this->Html->meta('icon'); ?>
		<?= $this->Html->css(array(
			'/backend/css/theme-dark',
			'/backend/css/custom',
			'/backend/css/icheck/skins/flat/red',
		)); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->scriptBlock("var fullwebroot = '{$this->Html->url('', true)}';"); ?>
		<?= $this->Html->script(array(
			'/backend/js/plugins/jquery/jquery.min',
			'/backend/js/plugins/bootstrap/bootstrap.min',
			'/backend/js/plugins/bootstrap/bootstrap-select',
			'/backend/js/plugins/icheck/icheck.min',
			'/backend/js/sitio',
			'/backend/js/actions'
			
		)); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
        <div class="page-container">
			<?= $this->element('admin_menu_lateral'); ?>
            <div class="page-content">
				<?= $this->element('admin_alertas'); ?>
				<?= $this->fetch('content'); ?>
			</div>
		</div>
        <audio id="audio-alert" src="<?= $this->Html->url('/backend/audio/alert.mp3'); ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= $this->Html->url('/backend/audio/fail.mp3'); ?>" preload="auto"></audio>
		<?= $this->Html->script(array('/backend/js/actions')); ?>
    </body>
</html>
