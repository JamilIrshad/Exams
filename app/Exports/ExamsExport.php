<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExamsExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithColumnWidths, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('categories as c')
            ->join('exams as e', 'c.id', '=', 'e.category_id')
            ->select('e.id', 'e.name', 'e.description', 'c.name as category_name', 'e.exam_date', 'e.price')
            ->orderBy('e.id', 'asc')
            ->get();
    }

    public function columnWidths(): array
    {
        return [
            'B' => 36,
            'C' => 74,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_CURRENCY_USD_INTEGER,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Exam Name',
            'Description',
            'Category',
            'Exam Date',
            'Price',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true, 'size' => 20]],
        ];
    }
}
