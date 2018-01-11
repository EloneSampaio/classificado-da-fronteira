<?php
/**
* 
*/
class frc_body_classes
{
	
	 /**
    * Custom Class for add, remove or get body classes.
    *
    * @param string $instance used for singleton.
    * @param array $class.
    */
    private static $instance;
    private $class;

    private function __construct()
    {
        $this->class = array();
    }

    /**
     * Singleton constructor.
     * @return an frc_body_classes object.
     */
    public static function newInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    //Add new body class
    public function add($class)
    {
        $this->class[] = $class;
    }

    //get a new clas
    public function get()
    {
        return $this->class;
    }
    
}
?>