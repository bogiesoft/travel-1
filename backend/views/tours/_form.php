<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support')->textarea(['rows' => 6]) ?>

    <?=$form->field($model, 'image[]')->fileInput(['multiple'=> true]) ?>

    <?php $images = $model->getImages();
    foreach($images as $image) {
        if($image){ ?><img src="<?=$image->getUrl('x200')?>" alt=""><?php }
    }
    ?>

    <?php $model->user_id = (int)Yii::$app->user->id; ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'cities')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru')) ?>

    <?php //var_dump($model->getCitiesCustom($model->id)); ?>

    <div class="form-group" id="citiesArea">
        <?php
        $modelId = !empty($model->id) ? $model->id : 0;
        foreach($model->getCitiesCustom($modelId) as $k => $city): ?>
            <div><input type="hidden" name="Tours[cities][<?=$k?>]" value="<?=$city['id']?>"><label><?=$city['title_ru']?></label><span class="removeCity glyphicon glyphicon-trash"></span></div>
        <?php endforeach; ?>
    </div>


    <?= $form->field($model, 'categories')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\TourCategory::find()->all(), 'id', 'title_ru'), ['multiple' => true]) ?>

    <?= $form->field($model, 'hotels')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Hotels::find()->all(), 'id', 'title_ru'), ['multiple' => true]) ?>

    <?php $model->status = true; ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        $(document).ready(function(){
            $('#tours-cities').change(function(e){
                var html = '<div><input type="hidden" name="Tours[cities]['+$('#citiesArea input').length+']" value="'+$(this).val()+'"><label>'+$(this).find('option:selected').text()+'</label><span class="removeCity glyphicon glyphicon-trash"></span></div>';
                $('#citiesArea').append(html);
            });

            $('body').on('click', '.removeCity', function(e){
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>

</div>