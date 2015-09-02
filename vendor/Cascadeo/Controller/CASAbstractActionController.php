<?php
/**
 * Created by PhpStorm.
 * User: teppy
 * Date: 8/3/15
 * Time: 12:29 AM
 */

namespace Cascadeo\Controller;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use Exception;
use Application\Entity\User;
use Cascadeo\Session\DashboardSession;
use Cascadeo\UserMessage\UserMessage;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class CASAbstractActionController
 * @package Cascadeo\Controller
 */
abstract class CASAbstractActionController extends AbstractActionController {

    /** @var DashboardSession */
    protected $session;

    /** @var  EntityManager */
    protected $entityManager;

    /** @var  User */
    protected $user;

    protected $config;

    public function __construct() {
        $this->session = DashboardSession::getInstance();
        $config = $this->session->getConfig();

        $this->entityManager = $this->getEntityManager($config);

        if ($this->session->getUser()) {
            try {
                $this->user = $this->entityManager->getRepository('\Application\Entity\User')
                    ->find($this->session->getUser()->getId());
            } catch (Exception $e) {
                error_log($e->getMessage());
                session_destroy();
                $this->flashMessenger()->addErrorMessage(UserMessage::GENERIC_ERROR);
            }
        }

        $this->config = $this->session->getConfig();
    }

    protected function getEntityManager($siteConfig) {
        //$this->entityManager = $this->session->getEntityManager();

        $dbParams = array(
            'driver'        => $siteConfig['db']['driver'],
            'user'          => $siteConfig['db']['username'],
            'password'      => $siteConfig['db']['password'],
            'dbname'        => $siteConfig['db']['database'],
            'host'          => $siteConfig['db']['host'],
            'charset'       => 'utf8',
            'driverOptions' => array(
                1002 => 'SET NAMES utf8'
            )
        );

        $paths = array('vendor/Cascadeo/model');
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $driver = new AnnotationDriver(new AnnotationReader(), $paths);
        AnnotationRegistry::registerFile('vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
        $config->setMetadataDriverImpl($driver);

        return EntityManager::create($dbParams, $config);
    }
}