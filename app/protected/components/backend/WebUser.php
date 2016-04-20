<?php
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params = array())
    {
        // var_dump($this->id);

        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }

        // var_dump($this->getState('user_id'));

        $record = User::model()->findByPK($this->id);

        if (!isset($record->role)) {
            return false;
        }

        if ($record->role == User::ROLE_BANNED) {
            return false;
        }

        // switch ($record->role) {
        //     case User::ROLE_GLOBAL_ADMIN:
        //         $view = 'admin';
        //         break;
        //     case User::ROLE_GLOBAL_MANAGER:
        //         $view = 'manager';
        //         break;
        //     default:
        //         return false;
        //         break;
        // }

        // $this->setState('view', $view);

        // allow access if the operation request is the current user's role
        return ($operation === (int)$record->role);
    }
}
?>
