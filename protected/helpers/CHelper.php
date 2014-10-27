<?php

class CHelper
{
    public static function humanDateToSqlDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format('yyyy-MM-dd', $date) : false;
    }

    public static function sqlDateToHumanDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format('dd.MM.yyyy', $date) : false;
    }

    public static function sqlDateToRussianDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format("dd MMMM yyyy", $date) : false;
    }

    public static function trimSeconds($time)
    {
        return !empty($time) ? Yii::app()->dateFormatter->format("HH:mm", $time) : false;
    }

    public static function buildDatepicker($class, $model, $fieldname, $fieldvalue = false, $on_select = false)
    {
        $max_year = intval(date('Y')) + 10;

        if ($fieldvalue === false) {
            $value = !empty($model->$fieldname) ? Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->$fieldname) : '';
        } else {
            $value = $fieldvalue;
        }

        $class->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'      => $fieldname,
            'language'  => 'ru',
            'model'     => $model,
            'attribute' => $fieldname,
            'options'=>array(
                'showAnim'=>'fade',
                'dateFormat'=>'dd.mm.yy',
                // 'buttonImage'=> Yii::app()->baseUrl . '/images/calendar_icon.gif',
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:' . $max_year,
                'onSelect'  => $on_select,
                // 'showButtonPanel' => true,
            ),
            'htmlOptions' => array(
                'value' => $value,
                'class' => 'input-small',
            ),
        ));
    }

    public static function timeToInt($time)
    {
        return intval(str_replace(':', '', $time));
    }

    public static function segment($number)
    {
        $url = Yii::app()->request->url;

        $url_array = explode('/', $url);

        foreach ($url_array as $key => $value) {
            if (
                ($value === '') ||
                ($value === 'index.php')
            ) {
                unset($url_array[$key]);
            }

            $value_array = array();
            $value_array = explode('?', $value);
            if (count($value_array) > 1) {
                $url_array[$key] = $value_array[0];
            }
        }
        $url_array = array_values($url_array);

        return isset($url_array[$number - 1]) ? $url_array[$number - 1] : false;
    }

    public static function transliteration($russian_text) {

        $abc = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'kh',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ъ' => '',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',

            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'E',
            'Ж' => 'ZH',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'Y',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'KH',
            'Ц' => 'TS',
            'Ч' => 'CH',
            'Ш' => 'SH',
            'Щ' => 'SHCH',
            'Ъ' => '',
            'Ы' => 'Y',
            'Ь' => '',
            'Э' => 'E',
            'Ю' => 'YU',
            'Я' => 'YA',

            ' ' => '-',
        );

        $english_text = str_replace(array_keys($abc), array_values($abc), $russian_text);
        $english_text = strtolower($english_text);

        return $english_text;
    }

    public static function cropText($text, $symbols)
    {
        $crop = mb_substr($text, 0, $symbols, 'UTF-8');

        $dots =  (mb_strlen($text, 'UTF-8') > $symbols) ? '...' : '';

        $crop .= $dots;

        return $crop;
    }

    public static function isJson($string)
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

}

?>
