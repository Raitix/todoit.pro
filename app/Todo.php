<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = "todos";
    protected $fillable = [
        "title",
        "text",
        "status"
    ];

    // Array status element order applies to $statusBtn order
    public $statuses = [
        "1" => [
            "panel-title" => "In progress",
            "panel-style" => "panel-info",
            "btn-class" => "btn-primary",
            "btn-activity" => "",
            "btn-title" => "Start",
            "btn-icon" => "fa-play"
        ],
        "2" => [
            "panel-title" => "Postponed",
            "panel-style" => "panel-warning",
            "btn-class" => "btn-warning",
            "btn-activity" => "",
            "btn-title" => "Postpone",
            "btn-icon" => "fa-clock-o"
        ],
        "4" => [
            "panel-title" => "Done",
            "panel-style" => "panel-success",
            "btn-class" => "btn-success",
            "btn-activity" => "",
            "btn-title" => "Done",
            "btn-icon" => "fa-check"
        ],
        "3" => [
            "panel-title" => "Canceled",
            "panel-style" => "panel-danger",
            "btn-class" => "btn-danger",
            "btn-activity" => "",
            "btn-title" => "Cancel",
            "btn-icon" => "fa-times"
        ],
        "0" => [
            "panel-title" => "To Do",
            "panel-style" => "panel-default",
            "btn-class" => "btn-default",
            "btn-activity" => "",
            "btn-title" => "Restart",
            "btn-icon" => "fa-road"
        ],
        "5" => [
            "panel-title" => "Hidden",
            "panel-style" => "",
            "btn-class" => "btn-link",
            "btn-activity" => "",
            "btn-title" => "Hide",
            "btn-icon" => "fa-ban"
        ]
    ];

    public function getStatusData()
    {
        if (isset($this->statuses[$this->status])) {

            $this->statuses[$this->status]["btn-activity"] = "active disabled";

            return $this->statuses[$this->status];
        } else {
            throw new \Exception("Exception - Undefined status");
        }
    }

}