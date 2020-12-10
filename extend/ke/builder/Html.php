<?php


namespace ke\builder;


class Html
{
    protected $tagName = '';

    protected $value = null;

    protected $attrs = [];

    protected $class = [];


    public function __construct($tagName = '')
    {
        $this->tagName = $tagName;
    }


    public function withTag($name)
    {
        $this->tagName = $name;

        return $this;
    }


    public function withAttr($name, $value)
    {
        $this->attrs[$name] = $value;
        return $this;
    }


    public function withClass($name)
    {
        $this->class[] = $name;
        return $this;
    }


    public function withValue($value)
    {
        $this->value = $value;
        return $this;
    }


    public function toString()
    {
        $attr = '';
        foreach ($this->attrs as $name=>$value) {
            if ($value != '') {
                $attr .= ' ' . $name . '="' . $value . '"';
            } else {
                $attr .= ' ' . $name;
            }
        }

        $class = '';
        if (count($this->class)) {
            $temps = [];
            foreach ($this->class as $name) {
                $temps[] = $name;
            }
            $class = ' class="' . implode(' ', $temps) . '"';
        }
        if (!is_null($this->value)) {
            return '<' . $this->tagName . $attr . $class . '>' . $this->value . '</' . $this->tagName . '>';
        } else {
            return '<' . $this->tagName . $attr. $class . ' />';
        }
    }

}
