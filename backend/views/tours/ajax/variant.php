<div class="vrnt-outer">
<h5>Вариант <?=$data['variantId']?> <i class="remove-variant fa fa-close"></i></h5>
<div class="col-md-12 variant-wrp">

    <!--<div class="text-right"><a data-day-id="<?/*=$data['dayId']*/?>" data-element-id="<?/*=$data['elementId']*/?>" data-variant-id="<?/*=$data['variantId']*/?>" href="" class="add-field">Добавить поле</a></div>-->

    <div class="row variant" id="d<?=$data['dayId']?>e<?=$data['elementId']?>v<?=$data['variantId']?>">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][label]" class="form-control" placeholder="Лейбл" size="20">
            </div>
            <!-- <div class="form-group">
                <input type="file" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][icon]" id="" class="form-control">
            </div> -->
            <div class="form-group">
                <input type="text" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][header]" class="form-control" placeholder="Заголовок" size="70">
            </div>
            <div class="form-group">
                <?php
                    echo \kartik\datetime\DateTimePicker::widget([
                        'name' => "Tours[days][".$data['dayId']."][schedule][".$data['elementId']."][variants][".$data['variantId']."][datetime]",
                        'id'=>"Tours[days][".$data['dayId']."][schedule][".$data['elementId']."][variants][".$data['variantId']."][datetime]",
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
                <select name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][object_id]" id="" class="form-control object-select">
                    <option value="0">Без объекта</option>
                    <?php foreach(\common\models\Hotels::find()->all() as $hotel): ?>
                        <option value="<?=$hotel->id?>"><?=$hotel->title_ru?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-group">
                    <label for="">Отметьте поля, которые надо скрыть</label>
                    <div class="fields-select">
                        <select name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][hide_fields][]" id="" multiple class="form-control">

                        </select>
                    </div>
                </div>
            </div>

    </div>
</div>
</div>