<?php
    
    namespace App\Services;
    
    class DateManager
    {
        public function getDateFromTimezone(string $timezone)
        {
            $UTC = new \DateTimeZone("UTC");

            $newTz = new \DateTimeZone($timezone);
            $date = new \DateTime('now', $UTC);
            $date->setTimezone($newTz);

            return $date;
        }
    }