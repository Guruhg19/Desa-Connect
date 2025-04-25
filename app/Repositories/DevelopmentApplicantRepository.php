<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\DevelopmentApplicant;
use App\Interfaces\DevelopmentApplicantRepositoryInterface;
use Exception;

class DevelopmentApplicantRepository implements DevelopmentApplicantRepositoryInterface
{
public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = DevelopmentApplicant::where(function($query) use ($search){
            if($search){
                $query->search($search);
            }
        });
        $query->orderBy('created_at', 'desc');
        if($limit){
            $query->take($limit);
        }
        if($execute){
            return $query->get();
        }
        return $query;
    }

    public function getAllPaginated(?string $search, ?int $rowPerPage)
    {
        $query = $this->getAll(
            $search,
            $rowPerPage,
            false
        );
        return $query->paginate($rowPerPage);
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $developmentApplicant = new DevelopmentApplicant();
            $developmentApplicant->development_id = $data['development_id'];
            $developmentApplicant->user_id = $data['user_id'];
            if(isset($data['status'])){
                $developmentApplicant->status = $data['status'];
            }
            $developmentApplicant->save();
            DB::commit();
            return $developmentApplicant;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}