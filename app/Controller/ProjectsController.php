<?php 

class ProjectsController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Project->locale = false;
		$this->Project->locale = Configure::read('Config.language');
		$data = $this->Project->find('all', array(
			'order' => array('id' => 'desc')
		));
		$title_for_layout = 'Проекты';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->Project->locale = 'ru';
		$this->Project->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->Project->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Project->create();
			$data = $this->request->data['Project'];
			// debug($this->request->data);
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Project->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Project->locale = 'en';
			}else{
				$this->Project->locale = 'ru';
			}
			// $this->Project->locale = 'ru';

			if($this->Project->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Project->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Project->id = $id;
			// $this->Project->locale = Configure::read('Config.languages');
			// debug($this->Project->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Project'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Project->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Project->locale = 'en';
			}else{
				$this->Project->locale = 'ru';
			}
			// $this->Project->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->Project->save($data1)){
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
			$this->Project->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Project->read(null, $id);
		}
			$this->set(compact('id', 'data'));

	}



	public function admin_delete($id){
		if (!$this->Project->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Project->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Project->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Project->locale = Configure::read('Config.language');
		$this->Project->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$data = $this->Project->findById($id);
		
		$title_for_layout = $data['Project']['title'];
		$meta['keywords'] = $data['Project']['keywords'];
		$meta['description'] = $data['Project']['description'];
		$this->set(compact('data', 'title_for_layout' ,'meta'));
	}
}