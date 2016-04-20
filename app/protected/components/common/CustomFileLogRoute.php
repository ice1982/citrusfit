<?php
class CustomFileLogRoute extends CFileLogRoute
{
    protected function formatLogMessage($message,$level,$category,$time)
    {
        //enter code here your custom message format
        return @date('Y/m/d H:i:s',$time)." [$level] [$category] $message\n";
    }
}