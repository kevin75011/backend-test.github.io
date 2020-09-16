<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @throws InvalidArgumentException
     */
    public function placeQueen(int $i, int $j): bool
    {
        if (($i >= 0) && ($i < 8) && ($j >= 0) && ($j < 8)){
            return true;
        }
        throw new InvalidArgumentException('The queen is not on the checkerboard');
    }

    /**
     * @param  int[]  $white  Coordinates of the white Queen
     * @param  int[]  $black  Coordinates of the black Queen
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {

    }
}
