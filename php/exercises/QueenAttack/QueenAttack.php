<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @throws InvalidArgumentException
     */
    public function placeQueen(int $i, int $j): bool
    {
        if (($i >= 0) && ($i < 8) && ($j >= 0) && ($j < 8))
            return true;  
        
        // Send exception
        throw new InvalidArgumentException('The queen is not on the checkerboard');
    }

    /**
     * @param  int[]  $white  Coordinates of the white Queen
     * @param  int[]  $black  Coordinates of the black Queen
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {
        // Check if queens are on the checkerboard
        try{
            placeQueen($white[0],$white[1]);
            
        // Exception propagation
        }catch(Exception $e){
            throw $e;
        }
        // Check rows and columns
        if(($white[0] == $black[0]) || ($white[1] == $black[1]))
            return true;

        // Check diagonals
        $deltaRow = abs($white[0] - $black[0]);
        $deltaCol = abs($white[1] - $black[1]);

        if ($deltaRow == $deltaCol)
            return true;
        
        return false;
    }
}
