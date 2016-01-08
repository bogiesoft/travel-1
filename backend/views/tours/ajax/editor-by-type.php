<?php if($data['typeId'] != 1 && $data['typeId'] != 4 && $data['typeId'] != 8 && $data['typeId'] != 12 && $data['typeId'] != 14){?>
    <input type="text" class="form-control" name="<?=$data['name']?>">
<?php } else { ?>
    <?php echo \mihaildev\ckeditor\CKEditor::widget([
        'name' => $data['name'],
        'id' => $data['name']
    ]) ?>
<?php } ?>