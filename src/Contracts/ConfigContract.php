<?php
namespace KofiCypher\PayStack\Contracts;

interface ConfigContract {

    /**
     * Returns all configs defined either in the .env or the constructor
     *
     * @return array
     */
    public static function get_config(string $seckey = null): array;
}