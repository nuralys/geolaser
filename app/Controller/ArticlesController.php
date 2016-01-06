<?php

class ArticlesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Article->locale = false;
		$this->Article->locale = Configure::read('Config.language');
		$data = $this->Article->find('all', array(
			'order' => array('date' => 'desc')
		));
		$title_for_layout = 'Публикации';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->Article->locale = 'ru';
		$this->Article->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->Article->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Article->create();
			$data = $this->request->data['Article'];
			// debug($this->request->data);
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Article->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Article->locale = 'en';
			}else{
				$this->Article->locale = 'ru';
			}
			// $this->Article->locale = 'ru';

			if($this->Article->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Article->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Article->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Article->id = $id;
			// $this->Article->locale = Configure::read('Config.languages');
			// debug($this->Article->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Article'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Article->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Article->locale = 'en';
			}else{
				$this->Article->locale = 'ru';
			}
			// $this->Article->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->Article->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Article->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Article->read(null, $id);
		}
			$this->set(compact('id', 'data'));

	}

	public function search(){

		$search = !empty($_GET['q']) ? $_GET['q'] : null;
		if(is_null($search)){
			$search_res = 'Введите пойсковый запрос...';
			return $this->set(compact('search_res'));
		}
		$title_for_layout = 'Поиск';
		$search_res = $this->Article->query("SELECT * FROM articles 
			WHERE articles.body LIKE '%{$search}%'");
		$this->set(compact('search_res', 'title_for_layout'));
	}

	public function test($id){
		// debug($id);
		$this->autoRender = false;

		$this->Article->locale = Configure::read('Config.language');
		$this->Article->locale = 'kz';
		$this->Article->bindTranslation(array('title' => 'titleTranslation'));
		debug($this->Article->findById($id));
		
	}
	public function test2($id=null){
		// debug($id);
		$this->autoRender = false;
		$this->Article->locale = 'kz';
		$this->Article->save(array(
			'id' => 23,
			'title' => 5555
			));
		
	}

	public function admin_delete($id){
		if (!$this->Article->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Article->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Article->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Article->locale = Configure::read('Config.language');
		$this->Article->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->Article->findById($id);
		$articles = $this->Article->find('all', array(
			'fields' => array('id', 'title', 'img', 'date'),
			'limit' => 4,
			'order' => array('date' => 'desc')
			));
		$title_for_layout = $post['Article']['title'];
		$meta['keywords'] = $post['Article']['keywords'];
		$meta['description'] = $post['Article']['description'];
		$this->set(compact('post', 'articles','title_for_layout' ,'meta'));
	}

}