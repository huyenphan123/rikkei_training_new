<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersAllExport implements FromCollection,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
        {
            $user = User::where('users.id','<>', 1)->get();
            return $user;
//             return User::all();
        }

    public function headings(): array {
        return [
            'ID',
            'Name',
            'Email',
            "Created",
            "Updated",
        ];
    }

    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->created_at,
            $user->updated_at
        ];
    }

}

