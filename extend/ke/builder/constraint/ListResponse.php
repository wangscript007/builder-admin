<?php


namespace ke\builder\constraint;


class ListResponse
{
    protected $data;

    protected $total;

    public function __construct($data, int $total)
    {
        $this->data = $data;
        $this->total = $total;
    }


    public function getItems()
    {
        return $this->data;
    }


    public function getTotal()
    {
        return $this->total;
    }

}
