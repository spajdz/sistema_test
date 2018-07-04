<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-list"></span> Mi Cuenta</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<!-- <h3 class="panel-title">Nuevo Usuario</h3> -->
				<div class="btn-group pull-right">
					<?= $this->Html->link('<i class="fa fa-plus"></i> Editar datos', array('action' => 'edit', $user['id']), array('class' => 'btn btn-success', 'escape' => false)); ?>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
						<table class="table">
							<tr>
								<th><?= $this->Form->label('perfil_id', 'Perfil usuario'); ?></th>
								<td><?= h($user['Perfil']['perfil'])?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= h($user['nombre'])?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('email', 'Email'); ?></th>
								<td><?= h($user['email'])?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('telefono', 'Teléfono'); ?></th>
								<td><?= h($user['telefono'])?></td>
							</tr>

							<tr>
								<th><?= $this->Form->label('username', 'Username'); ?></th>
								<td><?= h($user['username'])?></td>
							</tr>
						</table>
				</div>
			</div>
		</div>
	</div>
</div>
