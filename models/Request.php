<?php

namespace app\models;

use app\models\core\BaseModel;
use Router;

class Request extends BaseModel
{
    protected static $table_name = 'requests';

    protected static $public_fields = ['title', 'image', 'description', 'status', 'response_image', 'response', 'user_id', 'category_id'];

    public $title;
    public $description;
    public $status;
    public $response_image;
    public $response;
    public $image;
    public $category_id;
    public $user_id;
    
    protected $category_data;
    protected $user_data;

    protected static $statuses = [
        'new' => 'New',
        'in_progress' => 'In progress',
        'rejected' => 'Rejected',
        'done' => 'Done',
    ];

    public static function get_statuses() {
        return array_keys(static::$statuses);
    }

    public function get_image_url_attribute()
    {
        $src = $this->image;
        return Router::getUploads($src);
    }

    public function get_response_image_attribute()
    {
        $src = $this->response_image;
        return Router::getUploads($src);
    }

    public function get_user_attribute()
    {
        if (!isset($this->user_data)) {
            $this->user_data = User::get_by_id($this->user_id);
        }
        return $this->user_data;
    }

    public function get_category_attribute()
    {
        if (!isset($this->category_data)) {
            $this->category_data = RequestCategory::get_by_id($this->category_id);
        }
        return $this->category_data;
    }

    protected function get_russian_word_form($number, $form1, $form2, $form5)
    {
        $number = abs($number) % 100;
        $n1 = $number % 10;

        if ($number > 10 && $number < 20) {
            return $form5;
        }
        if ($n1 > 1 && $n1 < 5) {
            return $form2;
        }
        if ($n1 == 1) {
            return $form1;
        }
        return $form5;
    }

    public static function create($data)
    {
        if (isset($data['image'])) {
            $uploaded = static::upload_image($data['image']);
            if ($uploaded) {
                $data['image'] = $uploaded;
            } else {
                unset($data['image']);
            }
        }
        if (isset($data['response_image'])) {
            $uploaded = static::upload_image($data['response_image']);
            if ($uploaded) {
                $data['response_image'] = $uploaded;
            } else {
                unset($data['response_image']);
            }
        }

        return parent::create($data);
    }

    public function update($data)
    {
        if (isset($data['image'])) {
            $uploaded = static::upload_image($data['image']);
            if ($uploaded) {
                $data['image'] = $uploaded;
            } else {
                unset($data['image']);
            }
        }
        if (isset($data['response_image'])) {
            $uploaded = static::upload_image($data['response_image']);
            if ($uploaded) {
                $data['response_image'] = $uploaded;
            } else {
                unset($data['response_image']);
            }
        }

        return parent::update($data);
    }

    public function _update_all($data) {
        if (isset($data['image'])) {
            $uploaded = static::upload_image($data['image']);
            if ($uploaded) {
                $data['image'] = $uploaded;
            } else {
                unset($data['image']);
            }
        }
        if (isset($data['response_image'])) {
            $uploaded = static::upload_image($data['response_image']);
            if ($uploaded) {
                $data['response_image'] = $uploaded;
            } else {
                unset($data['response_image']);
            }
        }

        return parent::_update_all($data);
    }
}
