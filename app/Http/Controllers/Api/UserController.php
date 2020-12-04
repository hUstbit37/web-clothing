<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        try {
            return new UserCollection($this->userRepository->paginate(8));
//          return UserResource::collection($this->userRepository->paginate(8));
//          return UserResource::collection(UserResource::all());
        } catch (\Exception $e) {
            return $this->responseException($e);
        }
    }

    public function show($id)
    {
        try {
            return new UserResource($this->userRepository->find($id));
        } catch (\Exception $e) {
            return $this->responseException($e);
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $input = $request->only(['name', 'email', 'phone', 'gender', 'address', 'password']);
            $user = $this->userRepository->findByEmail($input['email']);
            $checkUser = !$user ? $this->userRepository->save($input) : $user;
            return new UserResource($checkUser);
        } catch (\Exception $e) {
            return $this->responseException($e);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $input = $request->only(['name', 'email', 'phone', 'gender', 'address', 'password']);
            return new UserResource($this->userRepository->save($input, $id));
        } catch (\Exception $e) {
            return $this->responseException($e);
        }
    }

    public function responseException($e)
    {
        return response()->json([
            'status' => false,
            'code' => 500,
            'message' => $e->getMessage(),
        ]);
    }
}
