<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * Description of ModelBase
 *
 * @author V
 */
abstract class ModelBase extends Model {

    use SoftDeletes;

    protected static function boot() {
        parent::boot();
        static::addGlobalScope( function(Builder $builder) {
            $dwz = app("App\Dwz\Dwz");
            $orderField = request($dwz->pageInfo->orderField);
            if ($orderField) {
                $orderDirection = request($dwz->pageInfo->orderDirection) ? request($dwz->pageInfo->orderDirection) : $dwz->defaultOrderDirection;
                $builder->orderBy($orderField, $orderDirection);
            }
        });
    }

}
