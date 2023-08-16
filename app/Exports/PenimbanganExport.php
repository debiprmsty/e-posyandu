<?php

namespace App\Exports;

use App\Models\Penimbangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;



class PenimbanganExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    use Exportable;

    private $id_dusun;
    private $tgl_awal;
    private $tgl_akhir;

    public function headings(): array
    {
        return [
            ['Nama Balita', 'Tanggal Lahir', 'Nama Orang Tua', 'Januari', '', 'Februari', '', 'Maret', '', 'April', '', 'Mei', '', 'Juni', '', 'Juli', '', 'Agustus', '', 'September', '', 'Oktober', '', 'November', '', 'Desember', ''],
            ['', '', '', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB'],
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('D1:E1');
        $sheet->mergeCells('F1:G1');
        $sheet->mergeCells('H1:I1');
        $sheet->mergeCells('J1:K1');
        $sheet->mergeCells('L1:M1');
        $sheet->mergeCells('N1:O1');
        $sheet->mergeCells('P1:Q1');
        $sheet->mergeCells('R1:S1');
        $sheet->mergeCells('T1:U1');
        $sheet->mergeCells('V1:W1');
        $sheet->mergeCells('X1:Y1');
        $sheet->mergeCells('Z1:AA1');
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');

        // Set border for all cells
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())->applyFromArray($styleArray);

        // Set bold font for header
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '2')->applyFromArray($headerStyle);

        // Set center alignment for data cells
        $dataStyle = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A3:' . $sheet->getHighestColumn() . $sheet->getHighestRow())->applyFromArray($dataStyle);
    }


    public function __construct($id_dusun, $tgl_awal, $tgl_akhir)
    {
        $this->id_dusun = $id_dusun;
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }
    public function query()
    {
        return Penimbangan::with(['balita'])->where('id_dusun', $this->id_dusun)
            ->whereBetween('tgl_timbangan', [$this->tgl_awal, $this->tgl_akhir]);
    }
    public function map($penimbangan): array
    {
        return [
            $penimbangan->id,
            $penimbangan->balita->nama_balita,
            $penimbangan->balita->tanggal_lahir
        ];
    }
}
