<?php

namespace AdrianMejias\States;

use Illuminate\Support\Facades\Facade;

/**
 * StatesFacade
 *
 */ 
class StatesFacade extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'states'; }
 
}