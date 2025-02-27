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
}
