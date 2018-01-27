<?php

namespace AdrianMejias\States;

use Illuminate\Database\Eloquent\Model;

/**
 * States
 *
 */
class States extends Model
{

    /**
     * @var string
     * Path to the directory containing states data.
     */
    protected $states = [];

    /**
     * @var string
     * The table for the states in the database, is "states" by default.
     */
    protected $table;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = \Config::get('states.table_name');
    }

    /**
     * Get the states from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getStates()
    {
        //Get the states from the JSON file
        if (sizeof($this->states) == 0) {
            $this->states = json_decode(file_get_contents(__DIR__ . '/Models/states.json'), true);
        }

        //Return the states
        return $this->states;
    }

    /**
     * Returns one state
     *
     * @param string $id The state id
     *
     * @return array
     */
    public function getOne($id)
    {
        $states = $this->getStates();
        return $states[$id];
    }

    /**
     * Returns a list of states
     *
     * @param string sort
     *
     * @return array
     */
    public function getList($sort = null)
    {
        //Get the states list
        $states = $this->getStates();
        
        //Sorting
        $validSorts = [
            'iso_3166_2',
            'name',
            'country_code',
        ];
        
        if (! is_null($sort) && in_array($sort, $validSorts)) {
            uasort($states, function ($a, $b) use ($sort) {
                if (!isset($a[$sort]) && !isset($b[$sort])) {
                    return 0;
                } elseif (!isset($a[$sort])) {
                    return -1;
                } elseif (!isset($b[$sort])) {
                    return 1;
                } else {
                    return strcasecmp($a[$sort], $b[$sort]);
                }
            });
        }
        
        //Return the states
        return $states;
    }
}
