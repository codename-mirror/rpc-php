<?php
namespace Mirror\Core;

use Mirror\Core\Components\ComponentInterface;

class Application implements \Serializable
{
    private $components = [];
    private $events = [];

    public function addComponent(ComponentInterface $component)
    {
        array_push($this->components, $component);
    }

    public function getComponent($name)
    {

    }

    public function serialize()
    {
        $app = new \stdClass();
        $app->components = $this->components;
        return json_encode($app);
    }

    public function unserialize($serialized)
    {
        $app = json_decode($serialized);
        $this->components = $app->components ?? null;
        $this->events = $app->events ?? null;
    }
}