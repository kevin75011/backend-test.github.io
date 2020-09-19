<?php

require_once('Robot.php');
    
class WalkingRobot implements Robot
{
    protected $name ='no_name';
    protected $func = 'Walking';

    public function powerReset() {
        
        $this->name = RobotFactory::generateName('WK');
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function doAction() {
        echo $this->name . ": " . $this->func . "\n";
    }
}
