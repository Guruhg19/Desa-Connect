<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Requests\DevelopmentApplicantStoreRequest;
use App\Http\Requests\DevelopmentApplicantUpdateRequest;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\DevelopmentApplicantResource;
use App\Interfaces\DevelopmentApplicantRepositoryInterface;

class DevelopmentApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private DevelopmentApplicantRepositoryInterface $developmentApplicantRepository;
    public function __construct(DevelopmentApplicantRepositoryInterface $developmentApplicantRepository)
    {
        $this->developmentApplicantRepository = $developmentApplicantRepository;
    }

    
    public function index(Request $request)
    {
        try {
            $developmentApplicants = $this->developmentApplicantRepository->getAll(
                $request->search,
                $request->limit,
                true
            );
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Diambil', DevelopmentApplicantResource::collection($developmentApplicants), 200);
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
            $developmentApplicants = $this->developmentApplicantRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Diambil', PaginateResource::make($developmentApplicants, DevelopmentApplicantResource::class), 200 );
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopmentApplicantStoreRequest $request)
    {
        $request = $request->validated();

        try {
            $developmentApplicant = $this->developmentApplicantRepository->create($request);
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Dibuat', new DevelopmentApplicantResource($developmentApplicant), 201);
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
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);
            if(!$developmentApplicant){
                return ResponseHelper::jsonResponse(false, 'Data Pendaftar Pembangunan Tidak Ditemukan', null, 404);
            }
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Diambil', new DevelopmentApplicantResource($developmentApplicant),201);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopmentApplicantUpdateRequest $request, string $id)
    {
        $request = $request->validated();
        try {
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);
            if(!$developmentApplicant){
                return ResponseHelper::jsonResponse(false, 'Data Pendaftar Pembangunan Tidak Ditemukan', null, 404);
            }
            $developmentApplicant = $this->developmentApplicantRepository->update($id, $request);
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Diupdate', new DevelopmentApplicantResource($developmentApplicant),201);
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
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);
            if(!$developmentApplicant){
                return ResponseHelper::jsonResponse(false, 'Data Pendaftar Pembangunan Tidak Ditemukan', null, 404);
            }
            $developmentApplicant = $this->developmentApplicantRepository->delete(
                $id
            );
            return ResponseHelper::jsonResponse(true, 'Data Pendaftar Pembangunan Berhasil Dihapus', null ,201);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
