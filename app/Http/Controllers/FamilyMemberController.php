<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\FamilyMemberResource;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\FamilyMemberStoreRequest;
use App\Http\Requests\FamilyMemberUpdateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Interfaces\FamilyMemberRepositoryInterface;
use Spatie\Permission\Middleware\PermissionMiddleware;

class FamilyMemberController extends Controller implements HasMiddleware
{
    private FamilyMemberRepositoryInterface $familyMemberRepository;

    public function __construct(FamilyMemberRepositoryInterface $familyMemberRepository)
    {
        $this->familyMemberRepository = $familyMemberRepository;
    }

    public static function middleware()
    {
        return [
            new Middleware(PermissionMiddleware::using(['family-member-list|family-member-create|family-member-edit|family-member-delete']), only:['index', 'getAllPaginated', 'show']),
            new Middleware(PermissionMiddleware::using(['family-member-create']), only:['store']),
            new Middleware(PermissionMiddleware::using(['family-member-edit']), only:['update']),
            new Middleware(PermissionMiddleware::using(['family-member-delete']), only:['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $familyMembers = $this->familyMemberRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Diambil', FamilyMemberResource::collection($familyMembers), 200);

        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request){
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);
        try {
            $familyMembers = $this->familyMemberRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'],
            );
            return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Diambil', PaginateResource::make($familyMembers, FamilyMemberResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyMemberStoreRequest $request)
    {
        $request = $request->validated();
        try {
            $familyMember = $this->familyMemberRepository->create($request);
            return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Ditambahkan', new FamilyMemberResource($familyMember), 200);
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
            $familyMember = $this->familyMemberRepository->getById($id);
            if(!$familyMember){
                return ResponseHelper::jsonResponse(false, 'Data Anggota Keluarga tidak ditemukan', null, 404);
            }
        return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Ditemukan', new FamilyMemberResource($familyMember), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyMemberUpdateRequest $request, string $id)
    {
        $request = $request->validated();
        try {
            $familyMember = $this->familyMemberRepository->getById($id);
            if(!$familyMember){
                return ResponseHelper::jsonResponse(false, 'Data Anggota Keluarga tidak ditemukan', null, 404);
            }
            $familyMember = $this->familyMemberRepository->update($id, $request);
            return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Diupdate', new FamilyMemberResource($familyMember), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $familyMember = $this->familyMemberRepository->getById($id);
            if(!$familyMember){
                return ResponseHelper::jsonResponse(false, 'Data Anggota Keluarga tidak ditemukan', null, 404);
            }
        $this->familyMemberRepository->delete($id);
        return ResponseHelper::jsonResponse(true, 'Data Anggota Keluarga berhasil Dihapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
