<?php

namespace App\Repositories;

use App\Interfaces\DevelopmentApplicantRepositoryInterface;
use App\Models\DevelopmentApplicant;

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
}