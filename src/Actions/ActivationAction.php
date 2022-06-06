<?php

namespace WpFluentAdmin\Actions;

use WpFluentAdmin\Databases\Member;

class ActivationAction
{

    public function __construct()
    {
        // $this->init_db();
    }


    public function init_db()
    {
        $databases = [
            Member::class,
        ];

        foreach ($databases as $database) {
            new $database;
        }
    }

}