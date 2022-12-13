<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users
     * @method GET
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Semua User',
            'data' => $users
        ], 200);
    }

    /**
     * Get user by id
     * @param $id
     * @method GET
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail User',
            'data' => $user
        ], 200);
    }

    /**
     * Create new user
     * @param Request $request
     * @method POST
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = $this->userRepository->createUser($request->all());
        return response()->json([
            'success' => true,
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 200);
    }

    /**
     * Update user by id
     * @param Request $request
     * @param $id
     * @method PUT
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = $this->userRepository->updateUser($request->all(), $id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'User berhasil diupdate',
            'data' => $user
        ], 200);
    }

    /**
     * Delete user by id
     * @param $id
     * @method DELETE
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = $this->userRepository->deleteUser($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus',
        ], 200);
    }

    /**
     * Login user
     * @param Request $request
     * @method POST
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = $this->userRepository->loginUser($request->all());
        $token = auth()->login($user);

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => [
                    'token' => $token,
                    'user' => $user
                ]
            ], 200);
        }
    }

    /**
     * Logout user
     * @method POST
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil',
        ], 200);
    }
}
