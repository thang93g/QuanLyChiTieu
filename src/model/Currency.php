<?php


namespace Money\model;


class Currency
{
    protected $name;
    protected $fullname;

    /**
     * Currency constructor.
     * @param $name
     * @param $fullname
     */
    public function __construct($name, $fullname)
    {
        $this->name = $name;
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname): void
    {
        $this->fullname = $fullname;
    }


}