<?php

abstract class AbstractBase
{
    protected $context = [];
    protected $template = '';

    public function run($action)
    {
        $this->addContext('aktion', $action);

        $methodName = $action . 'Aktion';
        $this->setTemplate($methodName);
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->render404();
        }

        $this->render();
    }

    public function render404()
    {
        http_response_code(404);
        die('Error 404');
    }

    protected function setTemplate($template, $controller = null)
    {
        if (empty($controller)) {
            $controller = get_class($this);
        }

        $this->template = "src/view/$controller/$template.tpl.php";
    }

    protected function getTemplate()
    {
        return $this->template;
    }

    protected function addContext($key, $value)
    {
        $this->context[$key] = $value;
    }

    protected function render()
    {
        extract($this->context);
        require_once $this->getTemplate();
    }
}