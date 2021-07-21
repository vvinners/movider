<?php

namespace VVinners\Movider;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vvinners\Movider\Skeleton\SkeletonClass
 */
class MoviderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'movider';
    }
}
