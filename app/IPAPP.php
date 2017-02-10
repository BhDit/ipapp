<?php


namespace App;


class IPAPP
{
    public static $solutionUpvotesReward = 30;
    public static $votesCheckpointForReward = 30;
    public static $upvoteXp = 5;
    public static $cheatPoints = 10;

    private static $developers =[
        'donkfather@yahoo.com',
        'admin@example.com',
    ];


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