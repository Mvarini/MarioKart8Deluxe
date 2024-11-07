<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            $userEmail = User::where('email', $row['email'])->first();
            if ($userEmail) {
                return redirect()->back()->with('error', 'Email existente! ' . $row['email']);
            }

            User::create([
                'name' => $row['name'],
                'nickname' => $row['nickname'],
                'email' => $row['email'],
                'password' => Hash::make($row['password'])
            ]);
        }
    }
}
