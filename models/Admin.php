<?php

namespace app\models;

use app\models\core\BaseModel;

class Admin extends BaseModel
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function create_request($data)
    {
        return Request::create($data);
    }

    public function create_request_category($data)
    {
        return RequestCategory::create($data);
    }

    public function update_request_by_id($id, $data)
    {
        $request = Request::get_by_id($id);
        $request->_update_all($data)->save();

        return $request;
    }

    public function update_request_category_by_id($id, $data)
    {
        $request = RequestCategory::get_by_id($id);
        $request->_update_all($data)->save();

        return $request;
    }

    public function delete_request_by_id($id)
    {
        return Request::get_by_id($id)->delete();
    }

    public function delete_request_category_by_id($id)
    {
        return RequestCategory::get_by_id($id)->delete();
    }

    public function create_user($data)
    {
        return User::create($data);
    }

    public function update_user_by_id($id, $data)
    {
        $user = User::get_by_id($id);
        $user->_update_all($data);

        if ($data['password']) {
            $user->set_password($data['password']);
        }

        $user->save();

        return $user;
    }

    public function delete_user_by_id($id)
    {
        return User::get_by_id($id)->delete();
    }
}
