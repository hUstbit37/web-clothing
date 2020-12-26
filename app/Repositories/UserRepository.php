<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    //save dung chung cho create & update
    public function save(array $input, $id = null)
    {
        return $this->userModel->updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']) ,
                'phone' => $input['phone'],
                'gender' => $input['gender'],
                'address' => $input['address'] ?? null,
            ]
        );
    }

    public function find($id)
    {
        return $this->userModel->find($id);
    }
    public function all()
    {
        return User::all();
    }

    public function findByEmail($email)
    {
        return $this->userModel->where(['email' => $email])->first();
    }

    //kiem tra xem email đã đăng ký chưa hoặc đã đăng ký thì verify hay chưa
    // Mail chưa đăng ký : false
    // Mail đã đăng ký và verified: true
    // Mail đã đăng ký nhưng not verify: false
    public function isVerify($email)
    {
        return $this->userModel->where(['email' => $email])->whereNotNull('email_verified_at')->exists();
    }
    // Khi update, nếu mail mới đã đăng ký và not verify thì sẽ p asshàm isVerify trên nên phải
    // check thêm id của mail mới != id user đang update để stop update và báo lỗi trùng email
    public function checkEmailUpdate($email, $id)
    {
        return $this->userModel->where(['email' => $email])->where('id', '!=', $id)->exists();
    }

    public function paginate($limit=5)
    {
        return $this->userModel->paginate($limit);
    }
}
