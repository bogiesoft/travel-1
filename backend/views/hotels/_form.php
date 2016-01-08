<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'place_ru')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'way_ru')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'categories')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ObjectCategory::find()->all(), 'id', 'title_ru'), ['multiple' => true]) ?>

    <?= $form->field($model, 'country_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru'))?>

    <?= $form->field($model, 'city_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru'))?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brone')->checkbox() ?>

    <h3>Параметры</h3>
    <div class="text-right"><a data-object-id="<?=$model->id?>" href="" class="add-object-field">Добавить поле</a></div>

    <div id="params">
        <?php foreach($model->fields as $f => $field): $f++; ?>
            <div class="field" id="f<?=$f?>">
                <h6>Поле <?=$f?></h6>
                <div class="form-group">
                    <select name="Hotels[fields][<?=$f?>][type_id]" id="" class="field-type-select form-control">
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
                    <?php if($field->type_id != 1 && $field->type_id != 4 && $field->type_id != 8 && $field->type_id != 12 && $field->type_id != 14){?>
                        <input type="text" value="<?=$field->content?>" class="form-control" name="Hotels[fields][<?=$f?>][value]">
                    <?php } else { ?>
                        <?php echo \mihaildev\ckeditor\CKEditor::widget([
                            'name' => 'Hotels[fields]['.$f.'][value]',
                            'value' => $field->content
                        ]) ?>
                    <?php } ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
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
    </script>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
