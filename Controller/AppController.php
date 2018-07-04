<?php
App::uses('Controller', 'Controller');
class AppController extends Controller
{
	public $helpers		= array(
		'Session', 'Html', 'Form'
	);
	public $components	= array(
		'Session',
		'Auth'		=> array(
			'loginAction'		=> array('controller' => 'usuarios', 'action' => 'login', 'admin' => true),
			'loginRedirect'		=> '/admin',
			'loginRedirectUser'	=> '/admin/usuarios/cuenta',
			'logoutRedirect'	=> '/admin',
			'authError'			=> 'No tienes permisos para entrar a esta sección.',
			'authenticate'		=> array(
				'Form'				=> array(
					'userModel'			=> 'Usuario',
					'fields'			=> array(
						'username'			=> 'username',
						'password'			=> 'password'
					)
				)
			)
		),
		'DebugKit.Toolbar',
	);

	public function beforeFilter()
	{
		/**
		 * Layout administracion y permisos publicos
		 */
		if ( ! empty($this->request->params['admin']) )
		{
			$this->layoutPath				= 'backend';
			AuthComponent::$sessionKey		= 'Auth.Usuario';
			$this->Auth->authenticate['Form']['userModel']		= 'Usuario';
		}
		else
		{
			AuthComponent::$sessionKey	= 'Auth.Usuario';
			$this->Auth->allow();
		}

	}

	public function beforeRender()
	{
		
		$user = $this->Auth->user();
		$admin = ($user['perfil_id'] == 1);

		$this->set(compact('admin'));
	}

}
