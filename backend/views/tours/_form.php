<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Tours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support')->textarea(['rows' => 6]) ?>

    <?=$form->field($model, 'image[]')->fileInput(['multiple'=> true]) ?>

    <?= $form->field($model, 'incost')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'outcost')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'maybecost')->widget(CKEditor::className()) ?>

    <div class="row images-preview">
    <?php $images = $model->getImages();
    foreach($images as $image) { ?>
        <?php if($image){ ?>
        <div class="col-lg-3 col-md-4 col-xs-6" data-image-id="<?=$image->id?>">
            <img src="<?=$image->getUrl('300x150')?>" alt="">
            <a href="" class="close-img"><i class="fa fa-close"></i></a>
        </div>
        <?php }
    }
    ?>
    </div>

    <?=$form->field($model, 'pdf')->fileInput() ?>
    <?php if($model->pdf) {?><a href="http://travel.alltoall.info<?= $model->pdf ?>">PDF файл маршрута</a><?php } ?>

    <?php $model->user_id = (int)Yii::$app->user->id; ?>

    <?= $form->field($model, 'user_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'))?>

    <?= $form->field($model, 'cities')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru')) ?>

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

    <input type="hidden" name="imagesToDelete" id="imagesToDelete" value="">

    <div id="days" class="form-group">

        <div class="form-group text-right">
            <a href="" class="btn add-day btn-primary">Добавить день</a>
        </div>

        <div class="days">
            <?php foreach($model->days as $d => $day): $d++; ?>
                <h4>День <?=$d?> </h4>
                <div class="text-right"><a data-day-id="<?=$d?>" class="add-element" href="">Добавить елемент</a></div>

                <div id="d<?=$d?>" class="col-md-12 day-wrp">
                    <div class="row">
                        <?php foreach($day->schedule as $e => $element): $e++; ?>
                            <h5>Елемент расписания <?=$e?> <a href="" class="collapse-el">(свернуть)</a></h5>

                            <div class="text-right"><a href="" data-day-id="<?=$d?>" data-element-id="<?=$e?>" class="add-variant">Добавить вариант</a></div>

                            <div class="col-md-12 el-wrp" id="d<?=$d?>e<?=$e?>">
                                <div class="row">
                                    <?php foreach($element->variants as $v => $variant): $v++; ?>
                                        <div class="vrnt-outer">
                                        <h5>Вариант  <?=$v?> <i class="remove-variant fa fa-close"></i></h5>
                                        <div class="col-md-12 variant-wrp">

                                            <div class="row variant" id="d<?=$d?>e<?=$e?>v<?=$v?>">
                                                <div class="form">
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" value="<?=$variant->label?>" name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][label]" class="form-control" placeholder="Лейбл" size="20">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                        <input type="file" name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][icon]" id="" class="form-control">
                                                        </div> -->
                                                        <div class="form-group">
                                                            <input type="text" value="<?=$variant->header?>" name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][header]" class="form-control" placeholder="Заголовок" size="70">
                                                        </div>

                                                        <div class="form-group">
                                                            <?php
                                                            echo \kartik\datetime\DateTimePicker::widget([
                                                                'name' => "Tours[days][".$d."][schedule][".$e."][variants][".$v."][datetime]",
                                                                'value'=> $variant->datetime,
                                                                'options' => [
                                                                    'placeholder' => 'Дата и время',
                                                                ],
                                                                'pluginOptions' => [
                                                                    'format' => 'yyyy-mm-dd hh:ii:ss',
                                                                    'startDate' => '2015-12-12 00:00:00',
                                                                    'todayHighlight' => true,
                                                                    'language'=> 'ru'
                                                                ]
                                                            ]);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Объект</label>
                                                        <select name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][object_id]" data-tour-id="<?=$model->id?>" id="" class="form-control object-select">
                                                            <option value="0">Без объекта</option>
                                                            <?php foreach(\common\models\Hotels::find()->all() as $hotel): ?>
                                                                <option value="<?=$hotel->id?>" <?=$variant->object_id == $hotel->id ? "selected='selected'":''?>><?=$hotel->title_ru?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="form-group">
                                                            <label for="">Отметьте поля, которые надо скрыть</label>
                                                            <div class="fields-select">
                                                                <select name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][hide_fields][]" id="" multiple class="form-control">
                                                                    <?php
                                                                    $hidden = \yii\helpers\ArrayHelper::map(\common\models\FieldsToHide::find()->where([
                                                                        'object_id'=>$variant->object_id,
                                                                        'tour_id'=>$model->id])
                                                                        ->all(), 'object_field_id', 'object_field_id');
                                                                    $object = \common\models\Hotels::findOne($variant->object_id);
                                                                    foreach($object->fields as $field): ?>
                                                                    <option value="<?=$field->id?>" <?=in_array($field->id, $hidden) ? 'selected="selected"' : ''?>><?=$field->type->name?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="text-right"><a data-day-id="<?/*=$d*/?>" data-element-id="<?/*=$e*/?>" data-variant-id="<?/*=$v*/?>" href="" class="add-field">Добавить поле</a></div>-->

                                                <div class="fields">
                                                    <?php foreach($variant->fields as $f => $field): $f++; ?>
                                                        <div class="field" id="d<?=$d?>e<?=$e?>v<?=$v?>f<?=$f?>">
                                                            <h6>Поле <?=$f?></h6>
                                                            <div class="form-group">
                                                                <select name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][fields][<?=$f?>][type_id]" id="" class="field-type-select form-control">
                                                                    <option value="">Тип поля</option>
                                                                    <?php $types = \common\models\FieldType::find()->all();
                                                                    foreach($types as $type){
                                                                        if($type->id == $field->type_id) {
                                                                            $selected = ' selected="selected"';
                                                                        } else {
                                                                            $selected = '';
                                                                        }
                                                                        echo '<option value="'.$type->id.'"'.$selected.'>'.$type->name.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group field-inp-wrp">
                                                                <!--
                                                                <textarea class="form-control" name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][fields][<?=$f?>][value]" id="" rows="4"><?=$field->content?></textarea>
                                                                -->
                                                                <?php if($field->type_id != 1 && $field->type_id != 4 && $field->type_id != 8 && $field->type_id != 12 && $field->type_id != 14){?>
                                                                    <input type="text" value="<?=$field->content?>" class="form-control" name="Tours[days][<?=$d?>][schedule][<?=$e?>][variants][<?=$v?>][fields][<?=$f?>][value]">
                                                                <?php } else { ?>
                                                                    <?php echo \mihaildev\ckeditor\CKEditor::widget([
                                                                        'name' => 'Tours[days]['.$d.'][schedule]['.$e.'][variants]['.$v.'][fields]['.$f.'][value]',
                                                                        'value' => $field->content
                                                                    ]) ?>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <input type="hidden" id="tourId" name="tourId" value="<?=$model->id?>">




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

            $('body').on('change', '.field-type-select', function(e){
                var typeId = $(this).val();
                var name = $(this).attr('name').replace(/type_id/g,"value");
                /*switch typeId {
                    case 1:

                        break;

                }*/
                $.post('/tours/editor-by-type', {typeId, name}, function(response){
                    $('[name="'+name+'"]').parents('.field-inp-wrp').html(response)
                });
            });

        });
    </script>

</div>