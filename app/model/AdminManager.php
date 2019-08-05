<?php

namespace App\Model;

/**
 * Class AdminManager
 * @package App\Model
 */
class AdminManager extends DatabaseManager
{
    const
        HOURS_TABLE = 'hours',
        DAYS = 'days';

    /**
     * Updatuje ordinační hodiny
     * @param $input
     * @param $id
     */
    public function updateOfficeHours($values)
    {
        $filtered = array();
        foreach ($values as $item) {
            $filtered[] = array(
                'hours_id' => $item->hours_id,
                'ill' => $item->ill,
                'for_invited' => $item->for_invited,
                'prevention_and_vaccination' => $item->prevention_and_vaccination
            );
        }
        $s = "ill=values(ill), for_invited=values(for_invited),prevention_and_vaccination=values(prevention_and_vaccination)";
        $this->database->query('INSERT INTO `hours`', $filtered, "ON DUPLICATE KEY UPDATE $s");
    }

    /**
     * Vrátí ordinační hodiny
     * @return array
     */
    public function getOfficeHours()
    {
        $hours = $this->database->table(self::HOURS_TABLE);
        $days = array();
        foreach($hours as $item) {
            $key = $item->day;
            $days[$key] = array(
                'hours_id' => $item->hours_id,
                'ill' => $item->ill,
                'for_invited' => $item->for_invited,
                'prevention_and_vaccination' => $item->prevention_and_vaccination);
        }
        return $days;
    }
}