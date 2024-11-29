<?php

namespace App\Imports\Admin;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportVoter implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            $user = User::firstOrCreate([
                'name' => $row['nama'],
                'email' => $row['email'],
            ], [
                'password' => bcrypt('password'),
            ]);
            
            $user->assignRole('voter');
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
