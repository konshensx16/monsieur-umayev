<?php

    namespace App\Services;

    class Fetcher
    {
        private $url = 'http://www.geoplugin.net/php.gp?ip=';

        public function getLocation(string $ip)
        {
            return unserialize(file_get_contents($this->url) . $ip);
        }
    }