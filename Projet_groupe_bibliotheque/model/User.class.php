<?php

class User
{

    private $firstName;
    private $lastName;

    public function __construct(array $user_info) //$_POST
    {
        $this->hydrate($user_info);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {


            // One gets the setter's name matching the attribute.
            $method = 'set' . ucfirst($key);
            // If the matching setter exists
            if (method_exists($this, $method)) {
                // One calls the setter.
                $this->$method($value);
            }
        }
    }

    public function setFirstname($value)
    {
        $this->firstName = $value;
    }

    public function setLastname($value)
    {
        $this->lastName = $value;
    }

    public function getLastname()
    {
        return $this->lastName;
    }

    public function getFirstname()
    {
        return $this->firstName;
    }
}
