<?php

namespace app\controllers;

use app\controllers\core\Controller;
use app\models\Request;
use app\models\Session;


class RequestsController extends Controller
{
    protected static $model = Request::class;


    public static function create()
    {
        $user = Session::user();

        $data = static::get_post_data([
            'image' => 'image',
            'title' => 'title',
            'description' => 'description',
            'category' => 'category_id',
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

        $request = Request::create(array_merge($data, ['user_id' => $user->id]));

        if ($request) {
            return static::response_success([
                'request' => $request->to_array(),
                'redirect' => '/my-requests'
            ], 'Request created successfully');
        }

        return static::response_error(502, 'Failed to create request');
    }
}
