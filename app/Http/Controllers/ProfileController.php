<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\ProfileResource;
use App\Interfaces\ProfileRepositoryInterface;

class ProfileController extends Controller
{
    private ProfileRepositoryInterface $profileRepository;
    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index(){
        try {
            $profile = $this->profileRepository->get();
            return ResponseHelper::jsonResponse(true, 'Profile Berhasil diambil', new ProfileResource($profile), 200);
            if(!$profile){
                return ResponseHelper::jsonResponse(false, 'Profile tidak ditemukan', null, 404);
            }
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
