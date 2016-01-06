<?php 

class Service extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'keywords',
			'description'
			)
		);
	// public $displayField = 'title';
	// public $name = 'News';
	// // public $locale = 'ru';

	// public $translateModel = 'NewsI18n';
	// public $translateTable = 'i18n'; //если че удалить
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		)
	);
	
}