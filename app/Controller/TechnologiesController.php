<?php 

class TechnologiesController extends AppController{
	
	public $uses = array('Technology', 'News');
	
	
	public function index(){
		$technologies = $this->Technology->find('all');
		$news = $this->News->find('all',array(
			'limit' => 3,
			'order' => array('created' => 'desc')
			));
		$this->set(compact('technologies', 'news'));
	}

	public function admin_index(){
		$this->Technology->locale = 'ru';
		$this->Technology->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->Technology->find('all');
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Technology->create();
			//$data = $this->request->data['Technology'];
			$slug = Inflector::slug($this->request->data['Technology']['title']);
			$data[] = $this->request->data['Technology'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Technology->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Technology->locale = 'en';
			}else{
				$this->Technology->locale = 'ru';
			}
			// debug($data);
			//  if(!$data['img']['name']){
			//  	unset($data['img']);
			// }
			if($this->Technology->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Technology->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Technology->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Technology->id = $id;
			$data = $this->request->data['Technology'];

			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Technology->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Technology->locale = 'en';
			}else{
				$this->Technology->locale = 'ru';
			}

			if($this->Technology->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data;
		}else{
			$this->Technology->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Technology->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Technology->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Technology->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($technology_alias = null){
		if(is_null($technology_alias)){
			throw new NotFoundException("Такой страницы нету");
		}

		$technology = $this->Technology->findByAlias($technology_alias);
		$technologies = $this->Technology->find('all');
		if(!$technology){
			throw new NotFoundException("Такой страницы нету");
		}

		$title_for_layout = $technology['Technology']['title'];
		$meta['keywords'] = $technology['Technology']['keywords'];
		$meta['description'] = $technology['Technology']['description'];

		$news = $this->News->find('all',array(
			'limit' => 3,
			'order' => array('created' => 'desc')
			));

		$this->set(compact('technology', 'technologies', 'news'));
	}
}