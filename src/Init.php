<?php

namespace WpFluentAdmin;

class Init
{

    /**
     * constructor.
     */
    public function __construct()
    {
        $classes = [
            Frontend::class,
        ];

        foreach ($classes as $class) {
            new $class;
        }
    }

}