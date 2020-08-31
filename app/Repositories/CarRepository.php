<?php


namespace App\Repositories;


use App\Car;

class CarRepository implements CarRepositoryInterface
{
    public function all()
    {
        return Car::orderBy('id', 'desc')->paginate(4);
    }

    public function findById($carId)
    {

    }


    public function update($carId)
    {

    }

    public function delete($carId)
    {

    }

    public function create($data)
    {
        $car = new Car();
        $car->name = $data->car_name;

        $car->save();

    }
}