<?php

namespace C16R\TimeAdder;

class TimeAdder
{
    public static function add($times)
    {
        $hours = 0;
        $minutes = 0;
        $seconds = 0;
        foreach ($times as $time) {
            $split = explode(':', $time);

            if (count($split) === 3) {
                $hours += (int) $split[0];
                $minutes += (int) $split[1];
                $seconds += (int) $split[2];
            } else {
                if (count($split) === 2) {
                    $minutes += (int) $split[0];
                    $seconds += (int) $split[1];
                } else {
                    if (count($split) === 1) {
                        $seconds += (int) $split[0];
                    }
                }
            }
        }

        while ($seconds >= 60) {
            $minutes++;
            $seconds -= 60;
        }

        while ($minutes >= 60) {
            $hours++;
            $minutes -= 60;
        }

        $hours = str_pad($hours, 2, '0', STR_PAD_LEFT);
        $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($seconds, 2, '0', STR_PAD_LEFT);

        return implode(':', [$hours, $minutes, $seconds]);
    }

}