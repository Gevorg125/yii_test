<?php
/* @var $this SiteController */
/* @var $model Users */



$this->menu=array(
	array('label'=>'Регистрация Пользователей', 'url'=>array('index')),
);
?>

<h1>Заявка</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$result,
	'attributes'=>array(
		'id',
		'sum',
		'percent',
		'user_agent',
		'ip',

	),
)); ?>
