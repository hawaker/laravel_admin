<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class permission_group extends Model {

    use SoftDeletes;
    
    public $dwzpage;

    public function dwzPage($navTab=false) {
        $pageNum = request("pageNum", 1);
        $numPerPage = request("numPerPage", 20);
        $count = $this->count();
        $targetType=$navTab?"navTab":"dialog";
        $this->dwzpage= '<div class="panelBar"><div class="pagination"'
            . ' targetType="'.$targetType.'" totalCount="'.$count.'"'
            . ' numPerPage="'.$numPerPage.'" pageNumShown=5'
            . ' currentPage="'.$pageNum.'"></div></div>';
    }

    public function dwzOrder() {
        //$orderField=request("orderField");
        //$orderDirection=request("orderDirection","asc");
    }

}
