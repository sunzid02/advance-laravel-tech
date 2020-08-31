<?php

namespace App\Repositories;

interface CarRepositoryInterface
{
    public function all();

    public function findById($carId);

    public function update($carId);

    public function delete($carId);

    public function create($car);
}