<?php

require_once('Robot.php');
    
class FlyingRobot implements Robot
{
    protected $name ='no_name';
    protected $func = 'Flying';
    
    public function powerReset() {
        
        $this->name = RobotFactory::generateName('FL');
    }

    public function getName()
    {
        return $this->name;
    }

    public function doAction() {
        echo $this->name . ": " . $this->func . "\n";
    }
}
