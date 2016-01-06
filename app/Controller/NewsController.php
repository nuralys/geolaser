<?php

class NewsController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->News->locale = false;
		$this->News->locale = Configure::read('Config.language');
		$data = $this->News->find('all', array(
			'order' => array('date' => 'desc')
		));
		$title_for_layout = 'Актуальные новости';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->News->locale = 'ru';
		$this->News->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->News->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->News->create();
			$data = $this->request->data['News'];
			// debug($this->request->data);
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
			}else{
				$this->News->locale = 'ru';
			}
			// $this->News->locale = 'ru';

			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			// $this->News->locale = Configure::read('Config.languages');
			// debug($this->News->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['News'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
			}else{
				$this->News->locale = 'ru';
			}
			// $this->News->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->News->save($data1)){
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
			$this->News->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->News->read(null, $id);
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
		$search_res = $this->News->query("SELECT * FROM news 
			WHERE news.body LIKE '%{$search}%'");
		$this->set(compact('search_res', 'title_for_layout'));
	}

	public function test($id){
		// debug($id);
		$this->autoRender = false;

		$this->News->locale = Configure::read('Config.language');
		$this->News->locale = 'kz';
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		debug($this->News->findById($id));
		
	}
	public function test2($id=null){
		// debug($id);
		$this->autoRender = false;
		$this->News->locale = 'kz';
		$this->News->save(array(
			'id' => 23,
			'title' => 5555
			));
		
	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->News->findById($id);
		$news = $this->News->find('all', array(
			'fields' => array('id', 'title', 'img', 'date'),
			'limit' => 4,
			'order' => array('date' => 'desc')
			));
		$title_for_layout = $post['News']['title'];
		$meta['keywords'] = $post['News']['keywords'];
		$meta['description'] = $post['News']['description'];
		$this->set(compact('post', 'news','title_for_layout' ,'meta'));
	}

}