<?php

namespace App\Imports;

use App\Models\Empdetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    protected $customerId;

    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

    public function model(array $row)
    {
        $key = 1;
        $token = isset($row['tokeno']) ? $row['tokeno'] : null;
        $fullname = isset($row['fullname']) ? $row['fullname'] : null;
        $category = isset($row['category']) ? $row['category'] : null;
        $setOrder = isset($row['setorder']) ? $row['setorder'] : null;
        $key++;

        return new Empdetail([
            'tokenNo' => $token,
            'fullName' => $fullname,
            'category' => $category,
            'setOrder' => $setOrder,
            'sname' => $key,
            'customer_id' => $this->customerId,
            'status' => "MP",
        ]);
    }
}
