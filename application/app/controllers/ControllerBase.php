<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $_isJsonResponse = false;

    // After route executed event
    public function afterExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher)
    {
        if ($this->_isJsonResponse) {
            $data = $dispatcher->getReturnedValue();
            if (is_array($data)) {
                $data = json_encode($data);
            }
            print $data;

            $this->response->setContent($data);
        }
    }

    protected function setJsonResponse()
    {
        $this->view->disable();

        $this->_isJsonResponse = true;
        $this->response->setContentType('application/json', 'UTF-8');
    }
}
