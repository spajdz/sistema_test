<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-list"></span> Usuarios</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nuevo Usuario</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Usuario', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('perfil_id', 'Perfil usuario'); ?></th>
								<td><?= $this->Form->input('perfil_id', array('class' => 'form-control select')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
								<td><?= $this->Form->input('nombre', array('placeholder' => 'Nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('email', 'Email'); ?></th>
								<td><?= $this->Form->input('email', array('placeholder' => 'Email')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('telefono', 'Teléfono'); ?></th>
								<td><?= $this->Form->input('telefono', array('placeholder' => 'Teléfono')); ?></td>
							</tr>

							<tr>
								<th><?= $this->Form->label('username', 'Username'); ?></th>
								<td><?= $this->Form->input('username', array('placeholder' => 'Username')); ?></td>
							</tr>
							
							<tr>
								<th><?= $this->Form->label('password', 'Clave'); ?></th>
								<td><?= $this->Form->input('password', array('type' => 'password', 'autocomplete' => 'off', 'value' => '', 'placeholder' => 'Clave')); ?></td>
							</tr>
						
						</table>
		
						<div class="pull-right">
							<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
							<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
						</div>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
