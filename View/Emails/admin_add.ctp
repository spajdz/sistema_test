<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<h2><span class="fa fa-list"></span> Emails</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nuevo Email</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?= $this->Form->create('Email', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
						<table class="table">
							<tr>
								<th><?= $this->Form->label('compra_id', 'Compra'); ?></th>
								<td><?= $this->Form->input('compra_id', array('class' => 'form-control select')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('asunto', 'Asunto'); ?></th>
								<td><?= $this->Form->input('asunto', array('placeholder' => 'Asunto')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('destinatario_email', 'Destinatario email'); ?></th>
								<td><?= $this->Form->input('destinatario_email', array('placeholder' => 'Destinatario email')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('destinatario_nombre', 'Destinatario nombre'); ?></th>
								<td><?= $this->Form->input('destinatario_nombre', array('placeholder' => 'Destinatario nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('remitente_email', 'Remitente email'); ?></th>
								<td><?= $this->Form->input('remitente_email', array('placeholder' => 'Remitente email')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('remitente_nombre', 'Remitente nombre'); ?></th>
								<td><?= $this->Form->input('remitente_nombre', array('placeholder' => 'Remitente nombre')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('cc', 'Cc'); ?></th>
								<td><?= $this->Form->input('cc', array('placeholder' => 'Cc')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('bcc', 'Bcc'); ?></th>
								<td><?= $this->Form->input('bcc', array('placeholder' => 'Bcc')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('procesado', 'Procesado'); ?></th>
								<td><?= $this->Form->input('procesado', array('class' => 'icheckbox')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('enviado', 'Enviado'); ?></th>
								<td><?= $this->Form->input('enviado', array('class' => 'icheckbox')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('reintentos', 'Reintentos'); ?></th>
								<td><?= $this->Form->input('reintentos', array('placeholder' => 'Reintentos')); ?></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('html', 'Html'); ?></th>
								<td><?= $this->Form->input('html', array('placeholder' => 'Html')); ?></td>
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
