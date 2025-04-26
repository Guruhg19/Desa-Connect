<?php

namespace App\Interfaces;

use Exception;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function get()
    {
        return Profile::first();
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $profile = new Profile();
            $profile->thumbnail = $data['thumbnail']->store('assets/profiles', 'public');
            $profile->name = $data['name'];
            $profile->headman = $data['headman'];
            $profile->people = $data['people'];
            $profile->about = $data['about'];
            $profile->agricultural_area = $data['agricultural_area'];
            $profile->total_area = $data['total_area'];
            if(array_key_exists('images', $data)){
                foreach($data['images'] as $image){
                    $profile->profileImages()->create([
                        'image' => $image->store('assets/profiles', 'public')
                    ]);
                }
            }
            DB::commit();
            return $profile;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function update(array $data)
    {
        DB::beginTransaction();
        try {
            $profile = Profile::first();
            if(isset($data['thumbnail'])){
                $profile->thumbnail = $data['thumbnail']->store('assets/profiles', 'public');
            }
            $profile->name = $data['name'];
            $profile->headman = $data['headman'];
            $profile->people = $data['people'];
            $profile->about = $data['about'];
            $profile->agricultural_area = $data['agricultural_area'];
            $profile->total_area = $data['total_area'];
            if(array_key_exists('images', $data)){
                foreach($data['images'] as $image){
                    $profile->profileImages()->create([
                        'image' => $image->store('assets/profiles', 'public')
                    ]);
                }
            }
            DB::commit();
            return $profile;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}