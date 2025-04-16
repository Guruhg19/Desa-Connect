<?php

namespace App\Repositories;

use App\Models\HeadOfFamily;
use App\Interfaces\HeadOfFamilyRepositoryInterface;

class HeadOfFamilyRepository implements HeadOfFamilyRepositoryInterface
{
public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = HeadOfFamily::where(function ($query) use ($search){
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