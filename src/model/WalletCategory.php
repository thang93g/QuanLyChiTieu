<?php


namespace Money\model;


class WalletCategory
{
    protected $name;
    protected $imgFile;

    /**
     * WalletCategory constructor.
     * @param $name
     * @param $imgFile
     */
    public function __construct($name, $imgFile)
    {
        $this->name = $name;
        $this->imgFile = $imgFile;
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
    public function getImgFile()
    {
        return $this->imgFile;
    }

    /**
     * @param mixed $imgFile
     */
    public function setImgFile($imgFile): void
    {
        $this->imgFile = $imgFile;
    }


}