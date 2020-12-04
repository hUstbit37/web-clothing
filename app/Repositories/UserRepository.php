<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    //save dung chung cho create & update
    public function save(array $input, $id = null)
    {
        return User::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => encrypt($input['password']) ,
                'phone' => $input['phone'],
                'gender' => $input['gender'],
                'address' => $input['address'] ?? null,
            ]
        );
    }

    public function find($id)
    {
        return User::find($id);
    }
    public function all()
    {
        return User::all();
    }

    public function findByEmail($email)
    {
        return User::where(['email' => $email])->first();
    }

    public function isVerify($email)
    {
        //kiem tra xem email đã đăng ký chưa hoặc đã đăng ký thì verify hay chưa
        // Mail chưa đăng ký : false
        // Mail đã đăng ký và verified: true
        // Mail đã đăng ký nhưng not verify: false
        return User::where(['email' => $email])->whereNotNull('email_verified_at')->exists();
    }

    public function paginate($limit)
    {
        return User::paginate($limit);
    }
}
