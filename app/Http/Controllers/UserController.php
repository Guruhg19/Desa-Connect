<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\UserStoreRequest;
use app\Http\Resources\PaginateResource;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {  
        $this->userRepository = $userRepository;
    }


    public function index(Request $request)
    {
        try{
            $users = $this->userRepository->getAll(
                $request->search,
                $request->limit,
                true
            );
            return ResponseHelper::jsonResponse(true, 'Data User Berhasil Diambil', UserResource::collection($users), 200);
        }catch(\Exception $e){
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request){
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);
        try{
            $users = $this->userRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );
            return ResponseHelper::jsonResponse(true, 'Data User Berhasil Diambil', PaginateResource::make($users, UserResource::class), 200);
        }catch(\Exception $e){
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $request = $request->validated();
        try {
            $user = $this->userRepository->create($request);
            return ResponseHelper::jsonResponse(true, 'User berhasil ditambahkan', new UserResource($user), 201);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = $this->userRepository->getById($id);
            if(!$user){
                return ResponseHelper::jsonResponse(false,'User tidak ditemukan', null, 404);
            }
            return ResponseHelper::jsonResponse(true,'Detail User berhasil diambil', new UserResource($user),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
