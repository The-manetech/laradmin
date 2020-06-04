<?php

namespace Laradmin;

class Laradmin 
{

    /**
     * This is the instance of laradmin
     * 
     * @since 1.0
     * 
     * @var string
     */
    protected static $instance;

    /**
     * This is the property that holds the core root
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $root;

    /**
     * This is the property that holds the core root
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $appsRoot = 'laradmin';


    /**
     * This is the property holds all that should be published
     * 
     * @since 1.0
     * 
     * @var array
     */
    public $publish;

    

    /**
     * This is the property that holds view folders
     * 
     * @since 1.0
     * 
     * @var array
     */
    protected $views;

    

    /**
     * This helps know the apps that won`t be loaded
     * 
     * @since 1.0
     * 
     * @var array
     */
    protected $dontLoad = [];

    

    /**
     * This helps know the apps that won`t be loaded
     * 
     * @since 1.0
     * 
     * @var string
     */
    protected $namespace = 'Laradmin\Http\Controllers';

    

    /**
     * This helps know the apps that won`t be loaded
     * 
     * @since 1.0
     * 
     * @var string
     */
    protected $apex;
    

    /**
     * This is the property that holds the main provider
     * 
     * @since 1.0
     * 
     * @var string
     */
    public $provider;



    

    /**
     * This is the property that holds the core root
     * 
     * @since 1.0
     * 
     */
    public function __construct()
    {
        $this->setRoot();

        $this->setDefaultPublish();

        
        if ($this->isInstalled()){

            $this->dontLoad = config('laradmin.dont_load', []);

            $this->apex = config('laradmin.apex', 'admin');

        }
        # code...
    }

    /**
     * This method gets the active instance of laradmin
     * 
     * @since 1.0
     * 
     * @return void
     */
    public static function instance()
    {
        return app(static::class);
    }

    /**
     * This method sets the core root of laradmin
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function setRoot()
    {
        $this->root = __DIR__.'/../';
    }


    /**
     * This method retrieves a path in laradmin core path
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function root( string $path = '')
    {
        if ($path) return clean_path( $this->root . '/' . $path );

        return $this->root;
    }

    //Token: e0e03d721fa48b5966dfa68145c481c0e3d99bbc

    

    /**
     * This method sets the default publishable resources of laradmin
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function setDefaultPublish()
    {
        $this->addPublish(
            'laradmin.config',
            [
            __DIR__.'/../publish/config/laradmin.php' => config_path('laradmin.php')
            ]
        );
    }

    /**
     * This method adds publishable resources with key
     * 
     * @since 1.0
     * 
     * @param string $tag
     * @param array $resources
     */
    public function addPublish(string $tag, array $resources)
    {

        if (!isset($this->publish[$tag])){
            $this->publish[$tag] = $resources;
        }else{
            $this->publish[$tag] = $this->publish[$tag] + $resources;
        }

    }


    /**
     * This is method bootstraps a laradmin
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function bootstrap(): void
    {


        if ($this->hasApp()){

            //$this->loadApps();

        }
        # code...
    }


    /**
     * This function loads
     */

    
    /**
     * This method check if laradmin is installed
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function isInstalled()
    {
        return is_file( config_path('laradmin.php') );
    }

    
    /**
     * This method check if laradmin has at least one app
     * 
     * @since 1.0
     * 
     * @return void
     */
    public function hasApp()
    {
        return is_dir( base_path('laradmin') );
    }


    
}
