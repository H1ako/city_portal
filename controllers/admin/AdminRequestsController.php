<?php

namespace app\controllers\admin;

use app\controllers\core\Controller;
use app\models\Request;
use app\models\Session;


class AdminRequestsController extends Controller
{
    protected static $model = Request::class;


    public static function create()
    {
        $admin = Session::user()->admin;

        $statuses = implode(',', Request::get_statuses());
        $data = static::get_post_data([
            'image' => 'image',
            'title' => 'name',
            'description' => 'desc',
            'category_id' => 'category_id',
            'status' => 'status',
            'response_image' => 'response_image',
            'response' => 'response',
        ]);
        $is_validated = static::validate_data($data, [
            'image' => 'required|file',
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|int',
            'status' => "requried|in:$statuses",
            'response_image' => 'file',
            'response' => 'string',
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

    public static function edit($id)
    {
        $admin = Session::user()->admin;

        $statuses = implode(',', Request::get_statuses());
        $data = static::get_post_data([
            'image' => 'image',
            'title' => 'name',
            'description' => 'desc',
            'category_id' => 'category_id',
            'status' => 'status',
            'response_image' => 'response_image',
            'response' => 'response',
        ]);
        $is_validated = static::validate_data($data, [
            'image' => 'required|file',
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|int',
            'status' => "requried|in:$statuses",
            'response_image' => 'file',
            'response' => 'string',
        ]);
        if (!$is_validated) {
            return static::response_error(400, 'Invalid data');
        }

        $request = $admin->update_request_by_id($id, $data);

        return static::response_success([
            'request' => $request->to_array(),
        ]);
    }

    public static function delete($id)
    {
        $admin = Session::user()->admin;

        if ($admin->delete_request_by_id($id)) {
            return static::response_success([], 'Request deleted successfully');
        }

        return static::response_error(502, 'Failed to delete request');
    }
}
