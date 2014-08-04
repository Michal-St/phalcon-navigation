<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */
namespace Modules\Navigation;

class Node {
    
    /**
     * Css class name
     * 
     * @var string
     */
    protected $class;
    
    /**
     * Node name
     * 
     * @var string 
     */
    protected $name;
    
    /**
     * Css id name
     * 
     * @var string 
     */
    protected $id;
    
    /**
     * Module name
     * 
     * @var string 
     */
    protected $module;
    
    /**
     * Controller name
     * 
     * @var string 
     */
    protected $controller;
    
    /**
     * Action name
     * 
     * @var string 
     */
    protected $action;
    
    /**
     * Url name
     * 
     * @var url
     */
    protected $url;
    
    /**
     * Node's childs
     * 
     * @var array 
     */
    protected $childs;
    
    /**
     * target html element
     * 
     * @var string
     */
    protected $target;
    
    /**
     * Parents node
     * 
     * @var Modules\Navigation\Node
     */
    protected $parent;
    
    /**
     * isActive node flag
     * 
     * @var bool 
     */
    protected $isActive = false;

    /**
     * Get css class name
     * 
     * @return string
     */
    public function getClass() {
        return $this->class;
    }

    /**
     * Get node name
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get css id name
     * 
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * get Url
     * 
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Get node childs
     * 
     * @return array | null
     */
    public function getChilds() {
        return $this->childs;
    }

    /**
     * Get html target
     * 
     * @return string
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * Get parents node
     * 
     * @return \Module\Navigation\Node | null
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * Get module name
     * 
     * @return string
     */
    public function getModule() {
        return $this->module;
    }

    /**
     * Get controller name
     * 
     * @return string
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * Get action name
     * 
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * Set css class name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setClass($value) {
        $this->class = $value;

        return $this;
    }

    /**
     * Set css id name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setId($value) {
        $this->id = $value;

        return $this;
    }

    /**
     * Set node name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setName($value) {
        $this->name = $value;

        return $this;
    }

    /**
     * Set url
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setUrl($value) {
        $this->url = $value;

        return $this;
    }

    /**
     * Set childs
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setChilds($value) {
        $this->childs = $value;

        return $this;
    }

    /**
     * Set html target
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setTarget($value) {
        $this->target = $value;

        return $this;
    }

    /**
     * Set Parent
     * 
     * @param \Modules\Navigation\Node $value
     * @return \Modules\Navigation\Node
     */
    public function setParent($value) {
        $this->parent = $value;

        return $this;
    }

    /**
     * Set module name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setModule($value) {
        $this->module = $value;

        return $this;
    }

    /**
     * Set controller name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setController($value) {
        $this->controller = $value;

        return $this;
    }

    /**
     * Set action name
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setAction($value) {
        $this->action = $value;

        return $this;
    }
    
    /**
     * Set active flag
     * 
     * @param type $value
     * @return \Modules\Navigation\Node
     */
    public function setActive($value) {
        $this->isActive = $value;

        return $this;
    }

    /**
     * Is node active?
     * 
     * @return bool
     */
    public function isActive() {
        return $this->isActive;
    }

    /**
     * Has node any childs
     * 
     * @return bool
     */
    public function hasChilds() {
        return 0 < count($this->getChilds());
    }

}
