<?php


namespace ke\builder;


class Html
{
    protected $tagName = '';

    protected $value = '';

    protected $attrs = [];

    protected $class = [];

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
            $attr .= ' ' . $name . '="' . $value . '"';
        }

        $class = '';
        if (count($this->class)) {
            $tmps = [];
            foreach ($this->class as $name) {
                $tmps[] = $name;
            }
            $class = ' class="' . implode(' ', $tmps) . '"';
        }
        if ($this->value) {
            return '<' . $this->tagName . $attr . $class . '>' . $this->value . '</' . $this->tagName . '>';
        } else {
            return '<' . $this->tagName . $attr. $class . ' />';
        }
    }

}
