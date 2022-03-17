<?php


class Borrower
{

    private $id_follower;
    private $id_book;
    private $date;


    public function __construct(array $borrow_info)
    {
        $this->hydrate($borrow_info);
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

    public function setId_follower($value)
    {
        $this->id_follower = $value;
    }

    public function setId_book($value)
    {
        $this->id_book = $value;
    }
    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getId_follower()
    {
        return $this->id_follower;
    }

    public function getId_book()
    {
        return $this->id_book;
    }
}
