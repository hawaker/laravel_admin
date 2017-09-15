<?php
namespace App\Dwz\Contracts;
interface statusCode{
    public function getOK();
    public function getERROR();
    public function getTIMEOUT();
}

