<?php


namespace App\Repositories;


use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map
            ->format();

        //        return Customer::orderBy('name')
        //            ->where('active', 1)
        //            ->with('user')
        //            ->get()
        //            ->map( function ($customer) {
        //                return $customer->format();
        //            });
    }

    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();

    }


    public function update($customerId)
    {
        $customer =  Customer::where('id', $customerId)->firstOrFail();

        $customer->update(request()->only('name'));

    }



    public function delete($customerId)
    {
        $customer =  Customer::where('id', $customerId)->delete();

    }


}