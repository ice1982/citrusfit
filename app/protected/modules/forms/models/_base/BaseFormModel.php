<?php

class BaseFormModel extends CFormModel
{
    public function addContact($contact)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'http://'.Yii::app()->params->crm['domen'].'/crm/api/add-contact');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($contact));
        $out = curl_exec($curl);

        curl_close($curl);

        return $out;
    }

    public function addLead($lead)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'http://'.Yii::app()->params->crm['domen'].'/crm/api/add-lead');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($lead));
        $out = curl_exec($curl);

        curl_close($curl);

        return $out;
    }
}

?>