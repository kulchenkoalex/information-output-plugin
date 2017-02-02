namespace includes;

class InformationOutputPlugin
{
 private static $instance = null;
    private function __construct() {
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }
	
	   static public function activation()
    {
        // debug.log
        error_log('plugin '.INFORMATIONOUTPUT_PlUGIN_NAME.' activation');
    }
	
}
StepByStepPlugin::getInstance();
