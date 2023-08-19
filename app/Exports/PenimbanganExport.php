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
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Http\Resources\PenimbanganResource;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Carbon\Carbon;
use App\Models\Balita;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooter;

use function PHPSTORM_META\map;

class PenimbanganExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    use Exportable;

    private $id_dusun;
    private $tgl_awal;
    private $tgl_akhir;
    private $no;

    public function headings(): array
    {
        return [
            ['No', 'Nama Balita', 'NIK Balita', 'Tanggal Lahir', 'Nama Orang Tua (Bapak/Ibu)', 'NIK Orang Tua (Bapak/Ibu)', 'Januari', '', 'Februari', '', 'Maret', '', 'April', '', 'Mei', '', 'Juni', '', 'Juli', '', 'Agustus', '', 'September', '', 'Oktober', '', 'November', '', 'Desember', '', 'Keterangan'],
            ['', '', '', '', '', '', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', 'BB', 'TB', '',],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
            'F' => NumberFormat::FORMAT_NUMBER,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('G1:H1');
        $sheet->mergeCells('I1:J1');
        $sheet->mergeCells('K1:L1');
        $sheet->mergeCells('M1:N1');
        $sheet->mergeCells('O1:P1');
        $sheet->mergeCells('Q1:R1');
        $sheet->mergeCells('S1:T1');
        $sheet->mergeCells('U1:V1');
        $sheet->mergeCells('W1:X1');
        $sheet->mergeCells('Y1:Z1');
        $sheet->mergeCells('AA1:AB1');
        $sheet->mergeCells('AC1:AD1');
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:D2');
        $sheet->mergeCells('E1:E2');
        $sheet->mergeCells('F1:F2');
        $sheet->mergeCells('AE1:AE2');
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


    public function __construct($no, $id_dusun, $tgl_awal, $tgl_akhir)
    {
        $this->id_dusun = $id_dusun;
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
        $this->no = $no;
    }
    public function collection()
    {
        $data = Penimbangan::with(['balita'])
            ->where('id_dusun', $this->id_dusun)
            ->whereBetween('tgl_timbangan', [$this->tgl_awal, $this->tgl_akhir])
            ->get()
            ->groupBy('id_balita');

        $collection = collect();

        foreach ($data as $group) {
            // Menggunakan PenimbanganResource untuk mengubah objek model
            $resourceGroup = $group->map(function ($item) {
                return new PenimbanganResource($item);
            });

            $collection->push($resourceGroup);
        }

        return $collection;
    }

    public function map($group): array
    {
        $beratBulan = [];
        $tinggiBulan = [];
        $existingBalitas = [];

        // Inisialisasi struktur data berdasarkan balita dan bulan
        foreach ($group as $index => $item) {
            $balita = $item->balita;
            $carbonDate = Carbon::parse($item->tgl_timbangan);
            $bulanBaru = $carbonDate->month;

            // Pastikan data penimbangan tersedia pada bulan tersebut
            if ($item->berat_badan && $item->tinggi_badan) {
                $beratBulan[$balita->id][$bulanBaru] = $item->berat_badan;
                $tinggiBulan[$balita->id][$bulanBaru] = $item->tinggi_badan;
            }

            // Simpan informasi balita yang sudah diproses
            if (!in_array($balita->nama_balita, $existingBalitas)) {
                $existingBalitas[] = $balita->nama_balita;
            }

            // Simpan keterangan untuk digunakan nanti
            $keterangan = $item->keterangan->nama_keterangan;
        }

        // Membuat array hasil
        $result = [];
        foreach ($existingBalitas as $namaBalita) {
            $rowData = [
                $this->no++,
                $namaBalita,
            ];

            // Cari data balita berdasarkan nama
            $balita = Balita::where('nama_balita', $namaBalita)->first();

            if ($balita) {
                $rowData[] = $balita->nik_balita;
                $rowData[] = $balita->tanggal_lahir;

                $ortu = $balita->ortu;
                if ($ortu->nama_bapak == null) {
                    $rowData[] = $ortu->nama_ibu;
                } else if ($ortu->nama_ibu == null) {
                    $rowData[] = $ortu->nama_bapak;
                } else {
                    $rowData[] = $ortu->nama_bapak . '/' . $ortu->nama_ibu;
                }
                $rowData[] = $ortu->nik_bapak . '/' . $ortu->nik_ibu;
            } else {
                $rowData[] = '';
                $rowData[] = '';
                $rowData[] = '';
                $rowData[] = '';
            }

            // Mengisi kolom berat dan tinggi berdasarkan data bulan dan balita
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                if (isset($beratBulan[$balita->id][$bulan])) {
                    $rowData[] = $beratBulan[$balita->id][$bulan] . ' kg';
                } else {
                    $rowData[] = 0;
                }

                if (isset($tinggiBulan[$balita->id][$bulan])) {
                    $rowData[] = $tinggiBulan[$balita->id][$bulan] . ' cm';
                } else {
                    $rowData[] = 0;
                }
            }

            // Keterangan (dari elemen terakhir dalam grup)
            $rowData[] = $keterangan;

            $result[] = $rowData;
        }

        return $result;
    }
}
