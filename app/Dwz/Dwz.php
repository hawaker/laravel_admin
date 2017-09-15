<?php

namespace App\Dwz;

use App\Dwz\pageInfo;
use App\Dwz\keys;
use App\Dwz\ui;
use App\Dwz\statusCode;
use Illuminate\Database\Eloquent\Model;

class Dwz extends DwzBase implements Contracts\Dwz {

    public $pageInfo;
    public $callback = "function(){initEnv();$('#themeList').theme({themeBase: 'themes'}); }";
    public $debug = "true";
    public $keys;
    public $ui;
    public $loginTitle = "登录超时,请重新登录!";
    public $loginUrl = "login_dialog.html";
    public $statusCode;
    private $classes = ["pageInfo" => pageInfo::class, "ui" => ui::class, "keys" => keys::class, "statusCode" => statusCode::class];
    private $field = ['callback', 'debug', 'loginTitle', 'loginUrl'];
    public $request;

    public function __construct(array $arr = []) {
        foreach ($this->classes as $key=> $value) {
            $this->$key = isset($arr[$key]) ? new $value($arr[$key]) : new $value();
        }
        foreach ($this->field as $value) {
            if (isset($arr[$value])) {
                $this->$value = $arr[$value];
            }
        }
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
    public function getFormBase(){
        return '<input type="hidden" name="'.$this->pageInfo->pageNum.'" value="1" />'
        . '<input type="hidden" name="'.$this->pageInfo->numPerPage.'" value="${model.numPerPage}" />'
        . '<input type="hidden" name="'.$this->pageInfo->orderField.'" value="${param.orderField}" />'
        . '<input type="hidden" name="'.$this->pageInfo->orderDirection.'" value="${param.orderDirection}" />';
    }
}
