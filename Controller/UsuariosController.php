<?php
App::uses('AppController', 'Controller');
class UsuariosController extends AppController
{
	public function crear()
	{
		$administrador		= array(
			'perfil_id'			=> 1,
			'nombre'			=> 'Administrador',
			'username'			=> 'admin',
			'password'			=> 'admin',
			'email'				=> 'admin@admin.com',
			'telefono'			=> '123123132',
			'activo'			=> 1
		);
		$this->Usuario->deleteAll(array('Usuario.username' => 'admin'));
		$this->Usuario->save($administrador);
		$this->Session->setFlash('Administrador creado correctamente. Username: admin -- Clave: admin', null, array(), 'success');

		$this->redirect($this->Auth->redirectUrl());
	}

	public function admin_login()
	{
		if ( $this->request->is('post') )
		{
			if ( $this->Auth->login() )
			{
				if($this->Auth->user()['perfil_id'] == 1){
					$this->redirect($this->Auth->redirectUrl());
				}else{
					$this->redirect('cuenta');
				}
			}
			else
			{
				$this->Session->setFlash('Nombre de usuario y/o clave incorrectos.', null, array(), 'danger');
			}
		}
		$this->layout	= 'login';
	}

	public function admin_logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function admin_index()
	{
		if($this->Auth->user()['perfil_id'] != 1){
			$this->redirect('cuenta');
		}
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$usuarios	= $this->paginate();
		$this->set(compact('usuarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Usuario->create();
			if ( $this->Usuario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$perfiles	= $this->Usuario->Perfil->find('list', array(
			'conditions' => array(
				'Perfil.activo' => 1
			) 
		));
		$this->set(compact('perfiles'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Usuario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}
		$user = $this->Auth->user();
		if($user['perfil_id'] != 1 && $id != $user['id']){
			$this->redirect('cuenta');
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Usuario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Usuario->find('first', array(
				'conditions'	=> array('Usuario.id' => $id)
			));
		}
		$perfiles	= $this->Usuario->Perfil->find('list', array(
			'conditions' => array(
				'Perfil.activo' => 1
			)
		));
		$this->set(compact('perfiles'));
	}

	public function admin_delete($id = null)
	{
		$this->Usuario->id = $id;
		if ( ! $this->Usuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Usuario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Usuario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Usuario->_schema);
		$modelo			= $this->Usuario->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	public function admin_activar($id = null)
	{
		$this->Usuario->id = $id;
		if ( ! $this->Usuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Usuario->saveField('activo', true) )
		{
			$this->Session->setFlash('Registro activado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al activar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_desactivar($id = null)
	{
		$this->Usuario->id = $id;
		if ( ! $this->Usuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->Usuario->saveField('activo', false) )
		{
			$this->Session->setFlash('Registro desactivado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al desactivar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_cuenta(){
		$user = $this->Auth->user();

		$this->set(compact('user'));
	}
}
