<?php

namespace app\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = User::where(function ($query) use ($search){
            if($search){
                $query->search($search);
            }
        });

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