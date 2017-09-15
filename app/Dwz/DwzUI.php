<?php

namespace App\Dwz;

use App\Dwz\Contracts\Dwz;

class DwzUI extends DwzBase implements Dwz {

    public $pageInfo;
    public $callback;
    public $debug;
    public $keys;
    public $ui;
    public $loginTitle;
    public $loginUrl;
    public $statusCode;

    public function __construct(Array $arr) {
        $this->pageInfo = new pageInfo($arr['pageInfo']);
        $this->callback = $arr['callback'];
        $this->debug = $arr['debug'];
        $this->keys = new keys($arr['keys']);
        $this->ui = new ui($arr['ui']);
        $this->loginTitle = $arr['loginTitle'];
        $this->loginUrl = $arr['loginUrl'];
        $this->statusCode = new statusCode($arr['statusCode']);
    }

    public function getCallback() {
        return $this->callback;
    }

    public function getDebug() {
        return $this->debug;
    }

    public function getKeys() {
        return $this->keys;
    }

    public function getLoginTitle() {
        return $this->loginTitle;
    }

    public function getLoginUrl() {
        return $this->loginUrl;
    }

    public function getPageInfo() {
        return $this->pageInfo;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getUI() {
        return $this->ui;
    }

}
