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

    public function getStatusData()
    {
        switch ($this->status) {
            case 0:
                return [
                    "title" => "To Do",
                    "btn-style" => "btn-default",
                    "panel-style" => "panel-default",
                    "icon" => "fa-road",
                    "text-style" => ""
                ];
            case 1:
                return [
                    "title" => "In progress",
                    "btn-style" => "btn-primary",
                    "panel-style" => "panel-info",
                    "icon" => "fa-play",
                    "text-style" => "text-info"
                ];
            case 2:
                return [
                    "title" => "Postponed",
                    "btn-style" => "btn-warning",
                    "panel-style" => "panel-warning",
                    "icon" => "fa-clock-o",
                    "text-style" => "text-warning"
                ];
            case 3:
                return [
                    "title" => "Canceled",
                    "btn-style" => "btn-danger",
                    "panel-style" => "panel-danger",
                    "icon" => "fa-times",
                    "text-style" => "text-danger"
                ];
            case 4:
                return [
                    "title" => "Done",
                    "btn-style" => "btn-success",
                    "panel-style" => "panel-success",
                    "icon" => "fa-check",
                    "text-style" => "text-success"
                ];
            case 5:
                return [
                    "title" => "Hidden",
                    "btn-style" => "btn-link",
                    "panel-style" => "",
                    "icon" => "fa-ban",
                    "text-style" => "text-muted"
                ];
                break;
            
            default:
                return "Undefined status id";
                break;
        die('hertex');
        }
    }

}