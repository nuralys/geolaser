<div class="admin">
<div class="ad_up">
	<h2>Вход в административную панель</h2>
</div>
<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => 'Имя пользователя'));
	echo $this->Form->input('password', array('label' => 'Пароль'));
	echo $this->Form->end('Login');
?>
</div>