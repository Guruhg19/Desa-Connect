<?php

namespace App\Interfaces;

interface ProfileRepositoryInterface
{
    public function get();

    public function create(array $data);

    public function update(array $data);
}