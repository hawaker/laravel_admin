<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class permissions extends Model {

    use SoftDeletes;
    public function dwzOrder(){
        $dwz= app("App\Dwz\Dwz");
    }
}