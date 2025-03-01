<?php

class WorkingHours extends Model
{

    protected static $tableName = 'working_hours';
    protected static $columns = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time',
        'class',
        'description'
    ];

    public static function loadFromUserAndDate($userId, $workDate)
    {
        $registry = self::getOne(['user_id' => $userId, 'work_date' => $workDate]);

        if (!$registry) {
            $registry = new WorkingHours([

                'user_id' => $userId,
                'work_date' => $workDate,
                'worked_time' => 0

            ]);
        }

        return $registry;
    }

    public function getNextTime()
    {
        if (!$this->time1) return 'time1';
        if (!$this->time2) return 'time2';
        if (!$this->time3) return 'time3';
        if (!$this->time4) return 'time4';
        return null;
    }

    public function innout($time)
    {
        $timeColumn = $this->getNextTime();

        if (!$timeColumn) {
            throw new AppException("Você já fez os 4 batimentos do dia permitidos!");
        }

        $this->addTimeColumnToTimes($this->timeColumn = $time);

        if ($this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    // Criada pela Júlio
    public function addTimeColumnToTimes($timeColumn)
    {
        $times = ['time1', 'time2', 'time3', 'time4'];

        foreach ($times as $time) {
            if (empty($this->values[$time])) {
                $this->values[$time] = $timeColumn;
                break;
            }
        }
    }

    function getWorkedInterval()
    {
        [$t1, $t2, $t3, $t4] = $this->getTimes();

        $part1 = new DateInterval('PT0S');
        $part2 = new DateInterval('PT0S');

        #PARTE DA MANHÃ
        if ($t1) $part1 = $t1->diff(new DateTime());
        if ($t2) $part1 = $t1->diff($t2);
        #PARTE DA TARDE
        if ($t3) $part2 = $t3->diff(new DateTime());
        if ($t4) $part2 = $t3->diff($t4);

        return sumIntervals($part1, $part2); #MEXI AQUI
    }

    function getLunchInterval()
    {
        [, $t2, $t3,] = $this->getTimes();
        $lunchInterval = new DateInterval('PT0S');

        if ($t2) $lunchInterval = $t2->diff(new DateTime());
        if ($t3) $lunchInterval = $t2->diff($t3);

        return $lunchInterval;
    }

    function getExitTime()
    {
        [$t1,,,$t4] = $this->getTimes();
        
        $workday = DateInterval::createFromDateString('8 hours');
        // $defaultlunchInterval = DateInterval::createFromDateString('1 hours');

        if (!$t1) {
            // return (new DateTimeImmutable())->add($workday)->add($defaultlunchInterval);
            return (new DateTimeImmutable())->add($workday);
        } elseif ($t4) {
            return $t4;
        } else {
            $total = sumIntervals($workday, $this->getLunchInterval());
            return $t1->add($total);
        }
    }

    private function getTimes()
    {
        $times = [];

        $this->time1 ? array_push($times, getDateFromString($this->time1)) : array_push($times, null);
        $this->time2 ? array_push($times, getDateFromString($this->time2)) : array_push($times, null);
        $this->time3 ? array_push($times, getDateFromString($this->time3)) : array_push($times, null);
        $this->time4 ? array_push($times, getDateFromString($this->time4)) : array_push($times, null);

        return $times;
    }
}
