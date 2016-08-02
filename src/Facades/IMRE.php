<?php
/**
 * Created by PhpStorm.
 * User: Brett
 * Date: 2016/6/13
 * Time: 23:17
 */

namespace Mozzos\LMRE\Facades;


use Illuminate\Support\Facades\Facade;

class LMRE extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LMRE';
    }
}