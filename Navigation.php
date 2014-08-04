<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */
namespace Modules;

class Navigation {

    /**
     * Navigation config
     * 
     * @var \Phalcon\Config 
     */
    private $_config = null;
    
    /**
     * Collection of navigations
     * 
     * @var array
     */
    private $_navigations = array();

    /**
     * Build all navigation with confoguration
     * 
     * @param type $config
     */
    public function __construct($config) {
        $this->_config = $config;

        foreach ($this->_config as $navigationName => $conf) {
            $conf->name = $navigationName;
            $this->_navigations[$navigationName] = $this->mapNode($conf);
        }
    }

    /**
     * Return all navigation collection
     * 
     * @param type $name
     * @return array
     */
    public function getNavigation($name) {
        if (!key_exists($name, $this->_navigations))
            return null;

        return $this->_navigations[$name];
    }

    /**
     * Generate HTML code
     * 
     * @param type $name
     * @return type
     */
    public function toHtml($name) {
        $helper = new \Modules\View\Helpers\Navigate();
        return $helper->toHtml($this->getNavigation($name));
    }

    /**
     * Collection mapper
     * 
     * @param type $config
     * @param type $parent
     * @return array
     */
    public function mapCollection($config, $parent = null) {
        $collection = array();
        foreach ($config as $nodeConfig) {
            $node = $this->mapNode($nodeConfig);
            $node->setParent($parent);
            $collection[] = $node;
        }
        return $collection;
    }

    /**
     * Node mapper
     * 
     * @param type $config
     * @return \Modules\Navigation\Node
     */
    public function mapNode($config) {

        $node = new \Modules\Navigation\Node();
        $allData = $config->toArray();
        
        foreach($allData as $key => $value){
            if($key == 'childs')
                continue;
            
            $node->{'set'.ucfirst($key)}($value);
        }

        if (isset($config->childs)) {
            $collection = $this->mapCollection($config->childs, $node);
            $node->setChilds($collection);
        }

        return $node;
    }

    /**
     * Set active node in all navigation collections.
     * 
     * @param type $action
     * @param type $controller
     * @param type $module
     * @return void
     */
    public function setActiveNode($action, $controller, $module) {
        $this->dissactiveNodes();

        foreach ($this->_navigations as $navigation) {
            $this->_activeCollection($navigation->getChilds(), $action, $controller, $module);
        }
    }

    /**
     * Activate all active nodes in collection.
     * 
     * @param type $collection
     * @param type $action
     * @param type $controller
     * @param type $module
     * @return void
     */
    public function _activeCollection($collection, $action, $controller, $module) {

        foreach ($collection as $node) {
            if ($node->getAction() == $action && 
                    $node->getController() == $controller && 
                        $node->getModule() == $module) {
                
                $this->_activateNode($node);
            }

            if ($node->hasChilds())
                $this->_activeCollection($node->getChilds(), $action, $controller, $module);
        }
    }

    /**
     * Activate node
     * 
     * @param type $node
     * @return void
     */
    private function _activateNode($node)
    {
        $node->setActive(true);
        if (!is_null($node->getParent()))
                $this->_activateNode ($node->getParent());
    }
    
    
    /**
     * Dissactive all nodes in collection
     * 
     * @param type $collection
     */
    private function _dissactiveCollection($collection) {
        foreach ($collection as $node) {
            $node->setActive(false);
            if ($node->hasChilds())
                $this->dissactiveCollection($node->getChilds());
        }
    }

    /**
     * Dissactive all nodes in all collections
     */
    public function dissactiveNodes() {
        foreach ($this->_navigations as $navigation) {
            $this->_dissactiveCollection($navigation);
        }
    }

}
