<?php
class Person
{
    protected $name;
    protected $age;
    protected $occupation;

    public function __construct($name, $age, $occupation)
    {
        $this->validate(['name' => $name, 'age' => $age, 'occupation' => $occupation]);
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->validate(['name' => $name]);
        $this->name = $name;
    }

    public function get_age() {
        return $this->age;
    }

    public function set_age($age) {
        $this->validate(['age' => $age]);
        $this->age = $age;
    }

    public function get_occupation() {
        return $this->occupation;
    }

    public function set_occupation($occupation) {
        $this->validate(['occupation' => $occupation]);
        $this->occupation = $occupation;
    }

    private function validate(array $targets) {
        if (array_key_exists('name', $targets) && !is_string($targets['name'])) {
            throw new InvalidArgumentException("Name must be a string!");
        }

        if (array_key_exists('occupation', $targets) && !is_string($targets['occupation'])) {
            throw new InvalidArgumentException("Occupation must be a string!");
        }

        if (array_key_exists('age', $targets) && (!is_int($targets['age']) || $targets['age'] < 0)) {
            throw new InvalidArgumentException("Age must be a non-negative integer!");
        }
    }
}