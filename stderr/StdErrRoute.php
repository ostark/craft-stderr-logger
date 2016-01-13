<?php namespace Craft;

/**
 * Class StdErrRoute
 * @package Craft
 */
class StdErrRoute extends \CLogRoute
{
    /**
     * @param array $logs
     */
    public function processLogs($logs)
    {

        $strErr = fopen("php://stderr", "w");

        foreach ($logs as $log) {

            $message = $log[0];
            $level   = isset($log[1]) ? $log[1] : '';
            $type    = isset($log[2]) ? $log[2] : '';
            $name    = isset($log[5]) ? $log[5] : '';

            fwrite($strErr, "[$type.$name.$level] $message \n");
        }

        fclose($strErr);

    }

}