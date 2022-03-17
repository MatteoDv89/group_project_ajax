<?php

class Book
{

    private $title;
    private $author;
    private $date;

    public function __construct(array $book_info)
    {
        $this->hydrate($book_info);
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

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function setAuthor($value)
    {
        $this->author = $value;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDate()
    {
        return $this->date;
    }
}
