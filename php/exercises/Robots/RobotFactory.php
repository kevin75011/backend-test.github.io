<?php

require_once('Robot.php');
require_once('FlyingRobot.php');
require_once('WalkingRobot.php');

class RobotFactory
{
    private static $registry = [];

    public function createFlyingRobot()
    {
        $robot = new FlyingRobot();
        self::$registry[] = $robot;
        return $robot;
    }
    
    public function createWalkingRobot()
    {
        $robot = new WalkingRobot();
        self::$registry[] = $robot;
        return $robot;
    }
    
    public static function generateName(String $model)
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphabet_length = strlen($alphabet);
        $number = '0123456789';
        $randomString = $model;
        
        do {
            for ($i = 0; $i < 5; $i++) {
                $randomString .= ($i < 3) ? $number[rand(0, 9)] : $alphabet[rand(0, $alphabet_length - 1)];
            }
        } while (in_array($randomString, self::$registry));
        
        return $randomString;
    }
    
    public function getRobots()
    {
        return self::$registry;
    }
}
