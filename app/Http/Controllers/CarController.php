<?php

namespace App\Http\Controllers;

use App\Repositories\CarRepositoryInterface;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @var CarRepositoryInterface
     */
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function index()
    {
        return $this->carRepository->all();
    }

    public function store(Request $request)
    {
        $this->carRepository->create($request);
    }

    public function show($carId)
    {

    }


    public function update($carId)
    {

    }

    public function destroy($carId)
    {

    }
}
