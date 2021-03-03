<?php

namespace App\Http\Controllers;

use App\Exports\PatientExport;
use Illuminate\Http\Request;

Use Maatwebsite\Excel\Excel;

class ImportExportController extends Controller
{
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export_excel()
    {
       return $this->excel->download(new PatientExport, 'Infos_Patient.xlsx', Excel::XLSX);
    }

    public function export_pdf()
    {
        return $this->excel->download(new PatientExport, 'Infos_Patient.pdf', Excel::DOMPDF);
    }
}
