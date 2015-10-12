<?php

namespace SONRest;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap (MvcEvent $event)
    {
        //recupera todos os eventos que estao acontecendo
        $sharedEvents = $event->getApplication()->getEventManager()->getSharedManager();

        //adiciona um listener, um novo evento
        //sempre que o AbstractRestfulController for executado, no momento do dispatch, ele executará com prioridade 100 o metodo postProcess
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractRestfulController',
                            MvcEvent::EVENT_DISPATCH,
                            array($this, 'postProcess'), -100);
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__
                )
            )
        );

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'SONRest\Service\ProcessJson' => function ($sm) {
                    $serializer = $sm->get('jms_serializer.serializer');
                    return new Service\ProcessJson(null, null, $serializer);
                }
            )
        );
    }

    public function postProcess(MvcEvent $event)
    {
        $processJson = $event->getTarget()->getServiceLocator()->get('SONRest\Service\ProcessJson');
        $data = $event->getResult();
        $response = new \Zend\Http\Response();

        $processJson->setResponse($response);
        $processJson->setData($data);

        return $processJson->process();
    }
}