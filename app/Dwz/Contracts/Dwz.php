<?php
namespace App\Dwz\Contracts;
interface Dwz{
    public function getLoginUrl();
    public function getLoginTitle();
    public function getStatusCode();
    public function getPageInfo();
    public function getKeys();
    public function getUI();
    public function getDebug();
    public function getCallback();
}