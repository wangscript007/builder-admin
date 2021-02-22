横线
===============

**1.实例化**

`new Hr()`

**2.设置风格**

`withMode(string)`

```
$this->engine->addComponent((new Container())
    ->withLayout(true)
    ->addComponent((new Hr()))

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_RED)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_ORANGE)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_GREEN)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_CYAN)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_BLUE)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_BLACK)
    )

    ->addComponent((new Hr())
        ->withMode(Bg::COLOR_GRAY)
    )
);
```
