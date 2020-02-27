<?php
//
//namespace App\Exports;
//
//use App\User;
//use Excel;
//use Illuminate\Contracts\View\View;
//use Maatwebsite\Excel\Concerns\FromCollection;
//
//class UsersDepartmentExport implements FromCollection
//{
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//
//    private $data;
//
//    public function collection()
//    {
//        return $this->data;
//    }
//
//    public function __construct($data)
//    {
//        //dd($data);
//        $this->$data = $data;
//    }
//
//    Excel::create('UsersDepartment', function($excel) use ($data) {
//        $excel->sheet('List users in department', function ($sheet) use ($data)
//});
//
//}
