<div class="page-sidebar">
	<ul class="x-navigation x-navigation-custom">
		
		<li class="xn-title"></li>
		<?if($admin):?>
			<li class="<?= ($this->Html->menuActivo(array('controller' => 'usuarios', 'action' => 'index')) ? 'active' : ''); ?>">
				<?= $this->Html->link(
					'<span class="fa fa-list-ol"></span> <span class="xn-text">Usuarios</span>',
					array('controller' => 'usuarios', 'action' => 'index'),
					array('escape' => false)
				); ?>
			</li>
		<?endif;?>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'usuarios', 'action' => 'view')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-user"></span> <span class="xn-text">Mi cuenta</span>',
				array('controller' => 'usuarios', 'action' => 'cuenta'),
				array('escape' => false)
			); ?>
		</li>

		<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
	
			<li class="">
				<a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
			</li>
			
		</ul>
		

	</ul>
</div>

<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="fa fa-sign-out"></span>¿Cerrar <strong>sesión</strong>?</div>
			<div class="mb-content">
				<p>¿Seguro que quieres cerrar sesión?</p>
				<p>Presiona NO para continuar trabajando y SI para cerrar sesión.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<?= $this->Html->link('Si', array('controller' => 'usuarios', 'action' => 'logout'), array('class' => 'btn btn-success btn-lg')); ?>
					<button class="btn btn-default btn-lg mb-control-close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
