<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

class DefaultMounthDate {

    public static function Date() {
        $first_day = new \DateTime('first day of this month');
        $last_day = new \DateTime('last day of this month');
        return ['first_day' => $first_day->format('Y-m-d'), 'last_day' => $last_day->format('Y-m-d')];
    }

}
