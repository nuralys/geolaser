<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('App', 'Technology', 'Service');

	public $components = array('DebugKit.Toolbar', 'Session', 'Auth' => array(
            'loginRedirect' => '/admin/',
            'logoutRedirect' => '/',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        ));
	public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {

        // debug($this->request->params);
        parent::beforeFilter();

        
        // debug($this->request->params['prefix']);
        $admin = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') ? 'admin/' : false;
        if(!$admin) $this->Auth->allow();
        if($admin){
            $this->layout = 'default';
        }else{
            $this->layout = 'index';
        }

        if(isset($this->params['language']) && $this->params['language'] == 'kz'){
            Configure::write('Config.language', 'kz');
            $this->Technology->locale = 'kz';
        }elseif(isset($this->params['language']) && $this->params['language'] == 'en'){
            Configure::write('Config.language', 'en');
        }else{
            Configure::write('Config.language', 'ru');
            $this->Technology->locale = 'ru';
            
        }
        // debug($this->request->params);
        // debug($this->params['language']);
        // $this->Technology->locale = 'ru';
        // $this->Technology->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
        $technologies = $this->Technology->find('all');
        $this->Service->locale = 'ru';
        $menu_left = $this->_serviceMenu(1);
        $menu_right = $this->_serviceMenu(2);
        $lang = ($this->params['language']) ? $this->params['language'] . '/' : '';
        $this->set(compact('admin', 'lang', 'technologies', 'menu_left', 'menu_right'));

    }

    protected function _catMainMenuHtml($service_tree = false){
        if(!$service_tree) return false;
        $html = '';
        foreach ($service_tree as $item) {
            $html .= $this->_catMainMenuTemplate($item);
        }
        return $html;
    }

    protected function _catMainMenuTemplate($services1){
        ob_start();
        include APP . "View/Elements/service_menu_tpl.ctp";
        return ob_get_clean();
    }


    protected function _serviceMenu($parent_id){
        
        $menu_left = $this->Service->find('all', array(
            'conditions' => array('parent_id' => $parent_id)
        ));
        return $menu_left;
    }

    protected function _serviceMenuTemplate($services1){
        ob_start();
        include APP . "View/Elements/service_child_tpl.ctp";
        return ob_get_clean();
    }
}
