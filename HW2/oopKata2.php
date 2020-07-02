<?php
class Person {
    public $first_name;
    public $last_name;

    public function __construct(string $first_name, string $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function get_full_name() :string{
        return $this->first_name . ' ' . $this->last_name;
    }
}