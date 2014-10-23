<?php

class BaseActiveRecord extends CActiveRecord
{
    /**
     * TODO
     */
    public function findByAlias($string = false)
    {
        $alias = false;

        $alias = ($string === false) ? $this->alias : $string;

        return $this->findByAttributes(array('alias' => $alias));
    }

    public function findIdByAlias($string = false)
    {
        $alias = false;

        if ($string !== false) {
            $alias = $string;
        }

        $model = $this->findByAlias($alias);

        return $model->id;
    }

    public function modifyArgumentStringToId($string)
    {
        $id = false;

        if ($string === false) {
            $id = $this->id;
        } else {
            if (ctype_digit($string)) {
                $id = (int) $string;
            } else {
                $id = $this->findIdByAlias($string);
            }
        }

        return $id;
    }

    public function findAllByPkArray($array)
    {
        $criteria = new CDbCriteria;

        $criteria->addInCondition('id', $array);

        $items_model = $this->findAll($criteria);

        return $items_model;
    }

}
