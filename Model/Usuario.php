<?php
App::uses('AppModel', 'Model');
class Usuario extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'nombre';

	/**
	 * BEHAVIORS
	 */
	var $actsAs			= array(
		/**
		 * IMAGE UPLOAD
		 */
		/*
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						)
					)
				)
			)
		)
		*/
	);

	/**
	 * VALIDACIONES
	 */
	public $validate = array(
		'username' => array(
				'unique' => array(
	            'rule' => 'isUnique',
	            'message' => 'Username ya existe!',
	            'on' => 'create'
	        )
		),
		
		'email' => array(
			'email' => array(
				'rule'			=> array('email'),
				'last'			=> true,
			),
		),
		'passsword' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
			),
		),
	);

	/**
	 * ASOCIACIONES
	 */
	public $belongsTo = array(
		'Perfil' => array(
			'className'				=> 'Perfil',
			'foreignKey'			=> 'perfil_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
		)
	);


	/**
	 * CALLBACKS
	 */
	public function beforeSave($options = array())
	{
		if ( isset($this->data[$this->alias]['password']) )
		{
			if ( trim($this->data[$this->alias]['password']) == false )
			{
				unset($this->data[$this->alias]['password'], $this->data[$this->alias]['repetir_password']);
			}
			else
			{
				$this->data[$this->alias]['password']	= AuthComponent::password($this->data[$this->alias]['password']);
			}
		}
		return true;
	}
}
