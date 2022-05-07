<?php

namespace Vilija19\passgen;

class Passgen
{
    public function genRandomPassword(int $length)
    {
        $passLength = 24;
        $temp = hash('sha256',date("U")*random_int(1, 999));

        if ($length<strlen($temp)) {
            $passLength = $length;
        }

        return substr($temp,-$passLength);
    }
}