<?php
/**
 * Created by PhpStorm.
 * User: joaopaulo
 * Date: 26/02/19
 * Time: 14:02
 */

namespace App\Services;


class BadgeService extends AppService
{

    /**
     * @param array $data
     * @return array
     */
    public function getBadges(array $data){
        return [
            'error' => false,
            'data' => $data
        ];
    }
}