<?php
namespace KofiCypher\PayStack\Contracts;

interface ConfigContract {
    public static function loadconfig();

    /**
     * Returns all configs defined either in the .env or the constructor
     *
     * @return array
     */
    public static function getConfig();
}