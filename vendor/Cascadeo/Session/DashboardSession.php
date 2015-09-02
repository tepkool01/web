<?php
/**
 * Created by PhpStorm.
 * User: teppy
 * Date: 8/3/15
 * Time: 12:33 AM
 */

namespace Cascadeo\Session;

use Application\Entity\User;
use Zend\Session\Container;

/**
 * Class DashboardSession
 * @package Cascadeo\Session
 */
class DashboardSession {

    /**
     * @var DashboardSession $instance
     */
    private static $instance;

    /**
     * @var Container $inst
     */
    private $container = null;

    /**
     * Get Singleton instance of DashboardSession
     * @return null|DashboardSession
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
            self::$instance->container = new Container();
        }
        return self::$instance;
    }

    /**
     * Private constructor for Singleton
     */
    private function __construct() {

    }

    /**
     * Set the session user
     * @param \Application\Entity\User $user
     */
    public function setUser(User $user) {
        $this->container->offsetSet('user', $user);
    }

    /**
     * Get the session user
     * @return \Application\Entity\User $user
     */
    public function getUser() {
        return $this->container->offsetGet('user');
    }

    /**
     * Set the application config
     * @param array $config
     */
    public function setConfig(array $config) {
        $this->container->offsetSet('config', $config);
    }

    /**
     * Get the application config
     * @return mixed
     */
    public function getConfig() {
        return $this->container->offsetGet('config');
    }

    /**
     * Set the current working app ID
     * @param $appId
     */
    public function setCurrentAppId($appId) {
        $this->container->offsetSet('appId', $appId);
    }

    /**
     * Get the current working app ID
     * @return mixed
     */
    public function getCurrentAppId() {
        return $this->container->offsetGet('appId');
    }

    /**
     * Set the current list of myApps
     * @param $apps
     */
    public function setMyApps($apps)
    {
        $this->container->offsetSet('myApps', $apps);
    }
    /**
     * Get the current list of myApps
     * @return mixed
     */
    public function getMyApps()
    {
        return $this->container->offsetGet('myApps');
    }
}