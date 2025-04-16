<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\HeadOfFamilyRequest;
use App\Http\Requests\HeadOfFamilyUpdateRequest;
use App\Http\Resources\HeadOfFamilyResource;
use app\Http\Resources\PaginateResource;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use Illuminate\Http\Request;

class HeadOfFamilyController extends Controller
{
    private HeadOfFamilyRepositoryInterface $headOfFamilyRepository;

    public function __construct(HeadOfFamilyRepositoryInterface $headOfFamilyRepository)
    {
        $this->headOfFamilyRepository = $headOfFamilyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $headOfFamilies = $this->headOfFamilyRepository->getAll($request->search, $request->limit, true);
            return ResponseHelper::jsonResponse(true,'Data Kepala Keluarga berhasil Diambil', HeadOfFamilyResource::collection($headOfFamilies), 200);
        } catch (\Exception $e) {
            ResponseHelper::jsonResponse(true,'Data Kepala Keluarga gagal Diambil', null, 500);
        }
    }

    public function getAllPaginated(Request $request){
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);
        try {
            $headOfFamilies = $this->headOfFamilyRepository->getAllPaginated(
                $request['search'] ?? null, 
                $request['row_per_page']
            );
            return ResponseHelper::jsonResponse(true,'Data Kepala Keluarga berhasil Diambil', PaginateResource::make($headOfFamilies, HeadOfFamilyResource::class), 200);
        } catch (\Exception $e) {
            ResponseHelper::jsonResponse(true,'Data Kepala Keluarga gagal Diambil', null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeadOfFamilyRequest $request)
    {
        $request = $request->validated();
        try {
            $headOfFamily = $this->headOfFamilyRepository->create($request);
            return ResponseHelper::jsonResponse(true, 'Kepala Keluarga berhasil ditambahkan', new HeadOfFamilyResource($headOfFamily), 201);
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
            $headOfFamily = $this->headOfFamilyRepository->getById($id);
            if(!$headOfFamily){
                return ResponseHelper::jsonResponse(false,'Kepala Keluarga tidak ditemukan', null, 404);
            }
            return ResponseHelper::jsonResponse(true,'Detail Kepala Keluarga berhasil diambil', new HeadOfFamilyResource($headOfFamily),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeadOfFamilyUpdateRequest $request, string $id)
    {
        $request = $request->validated();
        try {
            $headOfFamily = $this->headOfFamilyRepository->getById($id);

            if(!$headOfFamily){
                return ResponseHelper::jsonResponse(false,'Kepala Keluarga tidak ditemukan', null, 404);
            }

            $headOfFamily = $this->headOfFamilyRepository->update($id, $request);
            return ResponseHelper::jsonResponse(true, 'Kepala Keluarga berhasil diUpdate', new HeadOfFamilyResource($headOfFamily), 200);
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
            $headOfFamily = $this->headOfFamilyRepository->getById($id);

            if(!$headOfFamily){
                return ResponseHelper::jsonResponse(false,'Kepala Keluarga tidak ditemukan', null, 404);
            }
            $headOfFamily = $this->headOfFamilyRepository->delete($id);
            return ResponseHelper::jsonResponse(true, 'Kepala Keluarga berhasil diHapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
