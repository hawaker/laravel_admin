<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class users extends Authenticatable {

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot() {
        parent::boot();
        static::addGlobalScope(function(Builder $builder) {
            $dwz = app("App\Dwz\Dwz");
            $orderField = request($dwz->pageInfo->orderField);
            if ($orderField) {
                $orderDirection = request($dwz->pageInfo->orderDirection) ? request($dwz->pageInfo->orderDirection) : $dwz->defaultOrderDirection;
                $builder->orderBy($orderField, $orderDirection);
            }
        });
    }

}
