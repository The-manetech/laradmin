<?php

namespace Laradmin\App;

use Exception;


class App 
{
    /**
     * This is the name of the laradmin app
     * 
     * @since 1.0
     * 
     * @var string
     */
    protected $name;

    /**
     * This is laradmin instance
     * 
     * @since 1.0
     * 
     * @var Laradmin
     */
    protected $laradmin;

    /**
     * This is the root path of the laradmin app
     * 
     * @since 1.0
     * 
     * @var string
     * 
     */
    protected $root;

    /**
     * This is the route prefix of the laradmin app
     * 
     * @since 1.0
     * 
     * @var string
     * 
     */
    protected $routePrefix;

    /**
     * This is the guard name of the laradmin app
     * 
     * @since 1.0
     * 
     * @var string
     * 
     */
    protected $guardName;

    /**
     * This is the configuration of the laradmin app
     * 
     * @since 1.0
     * 
     * @var string
     * 
     */
    protected $config;

    
    /**
     * 
     * @param string $path
     */

    public function __construct( Laradmin $laradmin, string $path )
    {
        $this->laradmin = $laradmin;
        $this->root = $path;

        $this->loadConfig();
        
    }


    /**
     * This method is used to bootstrap a laradmin app
     * 
     * @since 1.0
     * 
     * @return void
     * 
     */

    public function bootstrap()
    {
        $this->loadConfig();

        //$this->loadRoutePaths();

    }

    /**
     * This method loads the config file of an app
     * 
     * @since 1.0
     * 
     * @return void
     * 
     */
    protected function loadConfig()
    {
        if ( is_file( clean_path($this->root.'/config.php') ) ){

            throw new Exception("The configuration file is not present in \"{$this->root}\"");

        }

        $this->config = include clean_path($this->root.'/config.php');
        
    }

    /**
     * This method is used for retrieving an app configuration
     * 
     * @since 1.0
     * 
     * @param string $key
     * @param mixed $default
     * 
     * @return mixed
     */
    public function config(string $key, $default = '')
    {
        if (isset($this->config[$key])){

            return $this->config[$key];

        }

        return $default;
    }

}
