<?php
namespace App\Repositories;

use App\Interfaces\SocialAssistanceRepositoryInterface;
use App\Models\SocialAssistance;

class SocialAssistanceRepository implements SocialAssistanceRepositoryInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = SocialAssistance::where(function ($query) use ($search){
            if($search)
            {
                $query->search($search);
            }
        });
        if($limit)
        {
            $query->take($limit);
        }
        if($execute)
        {
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