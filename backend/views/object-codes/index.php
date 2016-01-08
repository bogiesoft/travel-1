<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjectCodesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Коды объектов';
$this->params['breadcrumbs'][] = $this->title;


?>

<h4>Выгрузить в excel</h4>
<form action="/object-codes/get-excel/" class="form" method="post">
    <div class="form-group">
        <select name="object" id="" class="form-control" required>
            <option value="" selected>Выберите объект</option>
            <?php foreach($objects as $object): ?>
            <option value="<?=$object->id?>"><?=$object->title_ru?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-inline">
        <div class="form-group">
            <?= yii\jui\DatePicker::widget([
                'name' => 'time_from',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Время от',
                    'required'=>'required'
                ]
            ]) ?>
            <?= yii\jui\DatePicker::widget([
                'name' => 'time_to',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>[
                    'class'=>'form-control',
                    'placeholder'=>'Время до',
                    'required'=>'required'
                ]
            ]) ?>
            <select name="country" id="" class="form-control">
                <option value="0">Страна: не выбрано</option>
                <?php foreach(\yii\helpers\ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru') as $k => $country): ?>
                    <option value="<?=$k?>"><?=$country?></option>
                <?php endforeach; ?>
            </select>
            <select name="city" id="" class="form-control">
                <option value="0">Город: не выбрано</option>
                <?php foreach(\yii\helpers\ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru') as $k => $city): ?>
                <option value="<?=$k?>"><?=$city?></option>
                <?php endforeach; ?>
            </select>
            <select name="category" id="" class="form-control">
                <option value="0">Категория: не выбрано</option>
                <?php foreach(\yii\helpers\ArrayHelper::map(\common\models\ObjectCategory::find()->all(), 'id', 'title_ru') as $k => $category): ?>
                    <option value="<?=$k?>"><?=$category?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button class="btn btn-success">Скачать</button>
    </div>
</form>

<div class="object-codes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'object',
                'value' => 'object.title_ru'
            ],
            'code',
            [
                'attribute' => 'city',
                'value' => 'city.title_ru'
            ],
            [
                'attribute' => 'country',
                'value' => 'country.title_ru'
            ],
            [
                'attribute' => 'category',
                'value' => 'category.title_ru'
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
