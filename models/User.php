<?php

namespace app\models;

use app\models\core\BaseModel;

class User extends BaseModel
{
    protected static $table_name = 'users';

    protected static $public_fields = ['first_name', 'last_name'];
    protected static $private_fields = ['id', 'updated_at', 'created_at', 'password', 'role', 'email'];

    public $first_name;
    public $last_name;
    protected $email;
    protected $password;
    protected $role;

    protected $requests_data;


    public function get_requests_attribute()
    {
        if (!isset($this->requests_data)) {
            $this->requests_data = Request::where('user_id', '=', $this->id)->get();
        }
        return $this->requests_data;
    }


    public function get_admin_attribute()
    {
        if ($this->is_admin) {
            return new Admin($this);
        }

        throw new \Exception("User #{$this->id} has no admin privileges.");
    }


    public function get_is_admin_attribute()
    {
        return $this->role === 'admin';
    }


    public function get_full_name_attribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function get_email()
    {
        return $this->email;
    }


    public static function get_by_email($email)
    {
        return static::_get_by_field_protected('email', $email);
    }


    public function check_password($password)
    {
        return password_verify($password, $this->password);
    }


    public function set_password($password)
    {
        $this->password = static::hash_password($password);
    }

    protected static function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public static function check_for_unique($email)
    {
        return static::get_by_email($email) === null;
    }

    public static function create($data)
    {
        if (isset($data['password'])) {
            $data['password'] = static::hash_password($data['password']);
        }

        return parent::create($data);
    }
}
