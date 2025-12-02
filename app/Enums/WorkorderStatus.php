<?php

namespace App\Enums;

enum WorkorderStatus:string
{
    case PENDING = "pending";
    case IN_PROGRESS = "in_progress";
    case COMPLETED = "completed";

    case OVERDUE = "overdue";

    public function label():string
    {
        return match($this) {
            self::PENDING => "Pending",
            self::IN_PROGRESS => "In Progress",
            self::COMPLETED => "Completed",
            self::OVERDUE => "Overdue"
        };
    }
}
