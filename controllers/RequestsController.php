<?php

namespace app\controllers\admin;

use app\controllers\core\Controller;
use app\models\Request;
use app\models\Session;


class RequestsController extends Controller
{
    protected static $model = Request::class;


    public static function create()
    {
        $admin = Session::user()->admin;

        $data = static::get_post_data([
            'image' => 'image',
            'title' => 'name',
            'description' => 'desc',
            'category_id' => 'category',
        ]);
        $is_validated = static::validate_data($data, [
            'image' => 'file',
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|int',
        ]);
        if (!$is_validated) {
            return static::response_error(400, 'Invalid data');
        }

        $request = $admin->create_request($data);

        if ($request) {
            return static::response_success([
                'request' => $request->to_array(),
            ], 'Request created successfully');
        }

        return static::response_error(502, 'Failed to create request');
    }
}
