<?php

namespace app\controllers\admin;

use app\controllers\core\Controller;
use app\models\RequestCategory;
use app\models\Session;

class AdminRequestCategoriesController extends Controller
{
    protected static $model = RequestCategory::class;


    public static function create()
    {
        $admin = Session::user()->admin;

        $data = static::get_post_data([
            'title' => 'title',
        ]);
        $is_validated = static::validate_data($data, [
            'title' => 'required|string',
        ]);
        if (!$is_validated) {
            return static::response_error(400, 'Invalid data');
        }

        $request_category = $admin->create_request_category($data);

        if ($request_category) {
            return static::response_success([
                'request_category' => $request_category->to_array(),
            ], 'Request category created successfully');
        }

        return static::response_error(502, 'Failed to create service history');
    }

    public static function edit($id)
    {
        $admin = Session::user()->admin;

        $data = static::get_post_data([
            'title' => 'title',
        ]);
        $is_validated = static::validate_data($data, [
            'title' => 'required|string',
        ]);
        if (!$is_validated) {
            return static::response_error(400, 'Invalid data');
        }

        $request_category = $admin->update_request_category_by_id($id, $data);

        return static::response_success([
            'request_category' => $request_category->to_array(),
        ]);
    }

    public static function delete($id)
    {
        $admin = Session::user()->admin;

        if ($admin->delete_request_category_by_id($id)) {
            return static::response_success([], 'Request category deleted successfully');
        }

        return static::response_error(502, 'Failed to delete service history');
    }
}
