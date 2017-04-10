<?php
/**
 * Created by PhpStorm.
 * User: iqueda
 * Date: 8/3/16
 * Time: 10:38 AM
 */

namespace App\Custom\Helper;


class EnvironmentStatic
{
    /**
     * Return current environment.
     *
     * @return string
     */
    public static function getEnv()
    {
        if (!file_exists(base_path('envapp.php'))) {
            throw new \Exception('File envapp.php is required', 1);
        }

        require_once base_path('envapp.php');

        return getenv('environment');
    }
}