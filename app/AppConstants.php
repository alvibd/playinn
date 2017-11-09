<?php
/**
 * Created by PhpStorm.
 * User: Nvisio - Laptop 01
 * Date: 11/9/2017
 * Time: 12:54 PM
 */

namespace App;


class AppConstants
{
    const GENDER = [
        'Male' => 'MALE',
        'Female' => 'FEMALE',
        'Other' => 'OTHER'
    ];

    const GAME_LEVEL = [
        'Beginner' => 'BEGINNER',
        'Intermediate' => 'INTERMEDIATE',
        'Competitive' => 'COMPETITIVE'
    ];
    const JOINNING_STATUS = [
        'Invited' => "INVITED",
        'Requested' => 'REQUESTED',
        'Joined' => 'JOINED'
    ];

    const GAME = [
        'Football' => 'FOOTBALL',
        'Soccer' => 'SOCCER',
        'BasketBall' => 'BASKETBALL'
    ];
}