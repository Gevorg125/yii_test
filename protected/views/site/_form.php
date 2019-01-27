<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<?php $a = new CActiveForm(); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Имя'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'match', 'pattern'=>'^[а-яА-ЯёЁ\s]+$', 'message' => 'Поле "Имя" может содержать только буквы')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Фамилия'); ?>
		<?php echo $form->textField($model,'sur_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sur_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Отчество'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Дата Рождения'); ?>
<!--		--><?php //echo $form->textField($model,'birth_day'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(

            'model'=>$model,

            'attribute' => 'birth_day',

            'options'=>array(
                'dateFormat' => 'dd-mm-yy',
                'showAnim'=>'slide',
                'showOtherMonths'=>true,
                'selectOtherMonths'=>true,
                'yearRange'=>'1959:2001',
                'minDate' => '01-01-1959',
                'maxDate' => '12-31-2001',
                'changeYear'=>true,
            ),
            'htmlOptions'=>array(
                'style'=>''
            ),
        ));

        ?>
		<?php echo $form->error($model,'birth_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Серия и Номер Паспорта'); ?>
		<?php echo $form->textField($model,'passport_number'); ?>
		<?php echo $form->error($model,'passport_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Номер телефона'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>60,'maxlength'=>255, 'value'=>'+7')); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Регистрация' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->