<?php


class Views
{
    private $title;
    private $action;
    private $root;
    private $data;

    public function __construct($data, $root)
    {
        $this->data = $data;
        $this->root = $root;
        $this->title = $this->root .  "../src/Views/$this->data/$this->data.php";
        $this->action = $this->root .  "../src/Views/$this->data/$this->data"."Case.html";
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAction()
    {
        return $this->action;
    }
}
