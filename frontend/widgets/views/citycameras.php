<?php foreach($models as $model): ?>
    <?php $image = $model->getImage(); ?>
    <div class="another-cams__item col-lg-3 col-md-3 col-sm-3 col-xs-6">
        <div class="image">
            <div class="another-cams__item__place">
                <p>
                    <?=yii\helpers\Html::a($model->title_ru,
                        [yii\helpers\Html::encode('webcams/show/'.$model->id)],
                        ['style'=>'color:#fff'])?>
                </p>
            </div>
            <?=$image ? '<img src="'.$image->getUrl('168x122').'" alt="">' : ''?>
        </div>
    </div>
<?php endforeach; ?>

<a href="#" class="common-button load-more-btn common-button--thin">Показать ещё камеры</a>