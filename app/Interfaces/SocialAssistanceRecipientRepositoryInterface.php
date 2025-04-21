<?php

namespace App\Interfaces;

use Illuminate\Cache\RateLimiting\Limit;

interface SocialAssistanceRecipientRepositoryInterface 
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $excecute
    );

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    );

    public function create(array $data);

    public function getById(string $id);

    public function update(
        string $id,
        array $data
    );

    public function delete($id);

}