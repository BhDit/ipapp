<?php


namespace App;


class IPAPP
{
    private static $developers =[
        'donkfather@yahoo.com',
    ];

    public static $cheatPoints = 10;

    /**
     * Determine if the given e-mail address belongs to a developer.
     *
     * @param  string  $email
     * @return bool
     */
    public static function developer($email)
    {
        if (in_array($email, static::$developers)) {
            return true;
        }

        foreach (static::$developers as $developer) {
            if (str_is($developer, $email)) {
                return true;
            }
        }

        return false;
    }
}