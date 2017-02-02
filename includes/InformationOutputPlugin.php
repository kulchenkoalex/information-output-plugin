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
}
StepByStepPlugin::getInstance();
