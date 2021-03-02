<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Тестовый проект';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Leads Public Page</h1>

        <p class="lead">Add yours leads.</p>

    </div>

    <div class="body-content">

        <div class="row">
        
            <div class="col-lg-12">
        
                <div class="leads-form row">

                    <?php $form = ActiveForm::begin(); ?>

                        <?php 
                            $form = ActiveForm::begin([
                                'id' => 'leads-form',
                                'action' => ['save-leads'],
                                'enableAjaxValidation' => true,
                                'validationUrl' => \yii\helpers\Url::to(['validate-form']),
                            ]); 
                        ?>

                        <div class="col-xs-12 col-md-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                            <?php
                                echo $form->field($model, 'phone')
                                    ->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])
                                    ->textInput(['placeholder'=>'+7 (999) 999-99-99','class'=>'form-control']);
                             ?>
                        </div>

                        <div class="col-xs-12 col-md-4 col-md-offset-8">
                            <div class="form-group">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success pull-right']) ?>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>

        </div>

    </div>
</div>



<?php

$this->registerJs('

    $(\'body\').on(\'beforeSubmit\', \'form#leads-form\', function () {
        var form = $(this);
        if (form.find(\'.has-error\').length) 
        {
            return false;
        }
        $.ajax({
        url    : form.attr(\'action\'),
        type   : \'post\',
        data   : form.serialize(),
        success: function (response) 
        {
            if (response.success){
                alert(\'Leads saved succesfully\');
            }
        },
        error  : function () 
        {
            console.log(\'internal server error\');
        }
        });
        return false;
    });

',
    yii\web\View::POS_READY
);

?>