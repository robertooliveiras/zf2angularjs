<?php

namespace SONRest\Service;

use Zend\Http\Response;

class ProcessJson
{
    private $response;
    Private $data;
    private $serializer;

    public function __construct (\Zend\Http\Response $response = null, $data = null, $serializer = null)
    {
        $this->response = $response;
        $this->data = $data;
        $this->serializer = $serializer;
    }

    public function process()
    {
        $serializer = $this->serializer;
        $resutl = $serializer->serialize($this->data, 'json');

        $this->response->setContent($resutl);

        $headers = $this->response->getHeaders();
        $headers->addHeaderLine('Content-type','application/json');
        $this->response->setHeaders($headers);

        return $this->response;
    }


    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     * @return ProcessJson
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return ProcessJson
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * @param mixed $serializer
     * @return ProcessJson
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }


}