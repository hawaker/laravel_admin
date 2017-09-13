<?php

namespace App\Utils;

class ajaxDone {

    /**
     * navTabAjaxDone是DWZ框架中预定义的表单提交回调函数．
     * 服务器转回navTabId可以把那个navTab标记为reloadFlag=1,下次切换到那个navTab时会重新载入内容.
     * callbackType如果是closeCurrent就会关闭当前tab
     * 只有callbackType="forward"时需要forwardUrl值
     * navTabAjaxDone这个回调函数基本可以通用了，如果还有特殊需要也可以自定义回调函数.
     * 如果表单提交只提示操作是否成功,就可以不指定回调函数.框架会默认调用DWZ.ajaxDone()
     * <formaction="/user.do?method=save"onsubmit="returnvalidateCallback(this,navTabAjaxDone)">
     *
     * form提交后返回json数据结构statusCode=DWZ.statusCode.ok表示操作成功,做页面跳转等操作.statusCode=DWZ.statusCode.error表示操作失败,提示错误原因.
     * statusCode=DWZ.statusCode.timeout表示session超时，下次点击时跳转到DWZ.loginUrl
     * {"statusCode":"200", "message":"操作成功", "navTabId":"navNewsLi", "forwardUrl":"", "callbackType":"closeCurrent"}
     * {"statusCode":"300", "message":"操作失败"}
     * {"statusCode":"301", "message":"会话超时"}
     *
     */
    const SUCCESS = 200;
    const FAILURE = 300;
    const TIMEOUT = 301;
    const CLOSE = "closeCurrent";
    const FORWARD = "forward";

    public $statusCode;
    public $message = "";
    public $navTabId = "";
    public $forwardUrl = "";
    public $callbackType = "";
    public $rel = "";

    private function success($suc) {
        if (is_array($suc) && count($suc) > 0) {
            $suc = $suc[0];
        } else {
            $suc = true;
        }
        if ($suc) {
            $this->statusCode = self::SUCCESS;
        } else {
            $this->statusCode = self::FAILURE;
        }
        return $this;
    }

    private function failure() {
        $this->statusCode = self::FAILURE;
        return $this;
    }

    private function timeout() {
        $this->statusCode = self::TIMEOUT;
        return $this;
    }

    private function close() {
        $this->callbackType = self::CLOSE;
        return $this;
    }

    private function nav($str) {
        $this->navTabId = $str;
        return $this;
    }

    private function forward($url) {
        $this->forwardUrl = $url;
        if ($this->forwardUrl) {
            $this->callbackType = self::FORWARD;
        }
        return $this;
    }

    private function message($msg) {
        $this->message = $msg;
        return $this;
    }

    private function rel($rel) {
        $this->rel = $rel;
        return $this;
    }

    private function autoClose() {
        if (!$this->callbackType) {
            if ($this->statusCode == self::SUCCESS) {
                $this->callbackType = self::CLOSE;
            }
        }
        return $this;
    }

    private function autoMessage() {
        if (!$this->message) {
            if ($this->statusCode == self::SUCCESS) {
                $this->message = "操作成功!";
            } elseif ($this->statusCode == self::FAILURE) {
                $this->message = "操作失败!";
            } else {
                $this->message = "操作失败,登陆超时!";
            }
        }
        return $this;
    }

    public static function __callStatic($name, $arguments) {
        $my = new ajaxDone();
        return $my->$name(...array_values($arguments));
    }

    public function __call($name, $arguments) {
        return $this->$name(...array_values($arguments));
    }

    public function __toString() {
        return $this->out();
    }

    private function out() {
        $this->autoMessage();
        return json_encode($this);
    }

}
