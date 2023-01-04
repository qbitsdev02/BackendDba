<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Support\Responsable;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CashFlowExport extends DefaultValueBinder implements ShouldAutoSize, WithStyles, WithCustomStartCell,  FromCollection, Responsable, WithHeadings, WithMapping, WithCustomValueBinder
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'cash-flow.xlsx';
    private $title = 'Flujo de caja';
    public $headingTransalate = [];
    public $data = [];
    public $columns = [];

    public function __construct($data, $columns, $headingTransalate)
    {
        $this->data = $data;
        $this->columns = $columns;
        $this->headingTransalate = json_decode($headingTransalate, true);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function map($item): array
    {
        return  collect($this->columns)->map(function ($culumn) use ($item) {
            return $item[$culumn];
        })->toArray();
    }

    public function headings(): array
    {
        return collect($this->columns)->map(function ($column) {
            info($this->headingTransalate);
            if (isset($this->headingTransalate[$column])) {
                info($this->headingTransalate[$column]);
                return $this->headingTransalate[$column];
            }
        })->toArray();
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getColumnDimension('A')->setWidth(4, 'cm');
        $sheet->getRowDimension(1)->setRowHeight(50);
        $sheet->getColumnDimension('A')->setAutoSize(false);
        $sheet->getStyle(2)->getFont()->setBold(true);
        $sheet->setCellValue('B1', $this->title);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setSize(15);
        $sheet->getStyle('B1')->getAlignment()->setHorizontal(50);
        $sheet->mergeCells('B1:H1');
        return [
            'B1' => ['alignment' => ['horizontal' => 'center', 'vertical' => 'center']]
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }
}
