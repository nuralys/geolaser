<?php

class Technology extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'keywords',
			'description'
			)
		);
} 

?>