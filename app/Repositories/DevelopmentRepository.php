<?php

namespace App\Repositories;

use App\Interfaces\DevelopmentRepositoryInterface;
use App\Models\Development;

class DevelopmentRepository implements DevelopmentRepositoryInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = Development::where(function($query) use ($search){
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