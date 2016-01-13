<?php namespace Craft;

/**
 * StdErr Logger Plugin
 *
 * This plugin pipes logs to php://stderr stream
 * Works with fortrabbit.com & heroku.com
 *
 * @author    Oliver Stark <os@fortrabbit.com>
 * @license   http://buildwithcraft.com/license Craft License Agreement
 *
 * Example  
 *
 * // Write a log entry from a plugin
 * StdErrPlugin::log('Logs form Plugin');
 * 
 * // general log message      
 * Craft::log('something happend', 2);
 * 
 * // or throw a CraftException
 * throw new \Exception('CraftException');
 *
 */

/**
 * Class LoggerPlugin
 * @package Craft
 */
class StdErrPlugin extends BasePlugin
{
    /**
     * @return null|string
     */
    public function getName()
    {
        return Craft::t('StdErr Logger');
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '0.2';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Oliver Stark';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://www.fortrabbit.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }


    /**
     * @throws \Exception
     */
    public function init()
    {

        // Help the Yii autoloader to find the file
        \Yii::$classMap['Craft\StdErrRoute'] = realpath(__DIR__) . '/StdErrRoute.php';

        // Add StdErrRoute logger class
        craft()->log->addRoute('Craft\StdErrRoute');

    }

}
