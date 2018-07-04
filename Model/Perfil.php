<?php
App::uses('AppModel', 'Model');
class Perfil extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'perfil';


	/**
	 * VALIDACIONES
	 */
	public $validate = array(
		'perfil' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
			),
		),
	);

	/**
	 * ASOCIACIONES
	 */
	public $hasMany = array(
		'Usuario' => array(
			'className'				=> 'Usuario',
			'foreignKey'			=> 'perfil_id',
			'dependent'				=> false,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'exclusive'				=> '',
			'finderQuery'			=> '',
			'counterQuery'			=> ''
		)
	);
}
