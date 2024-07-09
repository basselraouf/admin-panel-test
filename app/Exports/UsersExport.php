<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'full_name', 'email', 'phone_number')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Telephone Number',
        ];
    }
}
