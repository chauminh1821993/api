<?php


namespace App\Repositories;

use App\Http\Requests\PhoneRequest;
use App\Models\Phone;

class PhoneRepository
{
    /**
     * Get list phone
     *
     * @return mixed
     */
    public function getLists()
    {
        return Phone::paginate(10);
    }

    /**
     * Save phone
     * @param PhoneRequest $input
     * @return Phone
     */
    public function storePhone($input)
    {
        $phone = new Phone();
        $phone->phone = optional($input)->phone;
        $phone->save();
        return $phone;
    }
}
