phalcon-navigation
==================

Simple MVC navigation to Phalcon Framework

===
 It's very easy and useful navigation module to Phalcon Navigation 

 - very easy configuration
 - multi nodes including
 - MVC including  
 - html view helper genaraor

=====

## Installation

Copy the main folder into your project where you keep libraries or modules.
For example (libs/ or app/vendor or /vendor). 

## Usage and Configuration

In your global configuration file you should to put array with navigation configuration

```php
    /**
     * Navigation
     */
    'navigation' => array(
        'top' => array(
            'class' => 'navigation',
            'id' => 'top-navigation',
            'childs' => array(
                array(
                    'url' => '/',
                    'name' => 'home',
                    'action' => 'index',
                    'controller' => 'index',
                    'module' => 'frontend',
                ),
                array(
                    'url' => '/index/test1',
                    'name' => 'test',
                    'action' => 'test1',
                    'controller' => 'index',
                    'module' => 'frontend',
                    'childs' => array(
                        array(
                            'url' => '/index/test2',
                            'name' => 'podstrona1',
                            'action' => 'test2',
                            'controller' => 'index',
                            'module' => 'frontend',
                        ),
                        array(
                            'url' => '/index/test3',
                            'name' => 'podtrona2',
                            'action' => 'test3',
                            'controller' => 'index',
                            'module' => 'frontend',
                        ),
                    )
                ),
                array(
                    'name' => 'link to google',
                    'url' => 'http://www.google.pl',
                    'target' => '_blank',
                    'class' => 'siemeczka',
                    'id' => 'navigation1'
                )
            ))
    ),
```

After you have to setup your Navigation Module to DI (in Bootstrap or index.php)

```php
        $config = $this->getConfig();
        $this->getDi()->set('navigation', function () use ($config) {
            return new \Modules\Navigation($config->navigation);
        }, true);
```

In ControllerBase or another abstract controller set:

```php
    public function initialize()
    {
        ...
        
        $this->getDI()->get('navigation')->setActiveNode(
                $this->router->getActionName(),
                $this->router->getControllerName(),
                $this->router->getModuleName()
        );
        
        $this->view->setVar("navigation", $this->getDI()->get('navigation'));
        
        ...
    }        
```

In view:

for volt: 
```php
        <div>
            {{ navigation.toHtml('top') }}
        </div>
```

for php: 
```php
        <div>
             <?php echo $navigation->toHtml('top'); ?>
        </div>
```

## Preview

![](/preview.jpg)

## @todo

 - add ACL checking
 - add Schedule checking