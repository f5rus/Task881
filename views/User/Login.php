
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model,'Пользователь'); ?>
        <?php echo $form->textField($model,'username') ?>
    </div>
 
    <div class="row">
		<?php echo $form->labelEx($model,'Пароль'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>
    
       <?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Captcha'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
    
    
    <div class="row submit">
        <?php echo CHtml::submitButton('Войти'); ?>
    </div>
 
    
    
    
<?php $this->endWidget(); ?>
</div><!-- form -->