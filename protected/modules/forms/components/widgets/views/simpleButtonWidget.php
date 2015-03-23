<a class="<?=$button_class?>" href="<?=$button_href?>" id="<?=$button_widget_id?>" title="<?=$button_text?>" onclick="<?=(!empty($button_yandex_target)) ? "yaCounter" . Yii::app()->params['yaCounter'] . ".reachGoal('" . $button_yandex_target . "', '" . $button_yandex_target_param . "'); return true;" : ""?>">
    <?=$button_text?>
</a>
