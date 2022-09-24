<?php

namespace App\Service;

/**
 * Class RandomService
 * @package App\Service
 */
class RandomService
{
    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    public function getRandomString(int $length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @param int $min
     * @param int $max
     * @return int
     * @throws \Exception
     */
    public function getRandomInteger(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    /**
     * @return \DateTimeInterface
     * @throws \Exception
     */
    public function getRandomDate(): \DateTimeInterface
    {
        return new \DateTime('@' . random_int(0, 2000000000));
    }



}