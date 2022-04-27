<?php
/* @var $cities \common\models\City */

?>
<option data-display="Выбрать ...">Выбрать ...</option>
<?php foreach ($cities as $city): ?>
    <option value="<?= $city->id ?>"><?= $city->name ?></option>
<?php endforeach; ?>
