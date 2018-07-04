<? App::uses('Debugger', 'Utility'); ?>
<div class="container" style="padding: 30px 0;">

	<div class="hero-unit" style="padding: 20px 60px;">
		<h1>Sistema realizado por Stephanie Piñero</h1>
		<p>
			<?= $this->Html->link('Crear usuario administrador', array('controller' => 'usuarios', 'action' => 'crear'), array('class' => 'btn btn-primary')); ?>
			<?= $this->Html->link('Entrar al back-end', '/admin', array('class' => 'btn btn-primary')); ?>
		</p>
	</div>

</div>
