<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
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
        $request = $request->validated([
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
