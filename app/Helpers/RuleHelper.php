<?php

namespace App\Helpers;

class RuleHelper
{
    private $rules;

    private function __construct($rules = [])
    {
        $this->rules = $rules;
    }

    /**
     * @param array $rules
     * @return RuleHelper
     */
    public static function create($rules = [])
    {
        return new RuleHelper($rules);
    }

    /**
     * @param $prefix
     * @param $objectRules
     * @return $this
     */
    public function addPrefix($prefix, $objectRules)
    {
        foreach ($objectRules as $key => $rule) {
            $this->rules[$prefix . "." . $key] = $rule;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function build()
    {
        return $this->rules;
    }
}
