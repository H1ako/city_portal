<?php

namespace app\models;

use app\models\core\BaseModel;

class RequestCategory extends BaseModel
{
    protected static $table_name = 'request_categories';

    protected static $public_fields = ['title'];

    public $title;
    
    protected $requests_data;

    public function get_requests_attribute()
    {
        if (!isset($this->requests_data)) {
            $this->requests_data = Request::where("category_id", "=", $this->id)->get();
        }
        return $this->requests_data;
    }
}
