<?php

require_once('Robot.php');
require_once('FlyingRobot.php');
require_once('WalkingRobot.php');

use PHPUnit\Framework\TestCase;
    
class RobotFactoryTest extends TestCase
{

    public function testgetNameWalkingRobot()
    {
        $robot = new WalkingRobot();
        $robot->powerReset();
        $this->assertRegExp('/^WK[a-z]{2}\d{3}$/i', $robot->getName());
    }
    
    public function testgetNameFlyingRobot()
    {
        $robot = new FlyingRobot();
        $robot->powerReset();
        $this->assertRegExp('/^FL[a-z]{2}\d{3}$/i', $robot->getName());
    }
    
    public function testresetNameWalkingRobot()
    {
        $robot = new WalkingRobot();
        $robot->powerReset();
        $name1 = $robot->getName();
        $robot->powerReset();
        $name2 = $robot->getName();
        $this->assertNotSame($name1, $name2);
        $this->assertRegExp('/WK\w{2}\d{3}/', $name2);
    }
    
    public function testresetNameFlyingRobot()
    {
        $robot = new FlyingRobot();
        $robot->powerReset();
        $name1 = $robot->getName();
        $robot->powerReset();
        $name2 = $robot->getName();
        $this->assertNotSame($name1, $name2);
        $this->assertRegExp('/FL\w{2}\d{3}/', $name2);
    }
    
}
