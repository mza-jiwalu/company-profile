<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Lamaran;

class LamaranExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $params = 0;

    public function setParams(int $params)
    {
        $this->params = $params;
        return $this;   
    }

    public function query()
    {
        return Lamaran::query()->where('id_lowongan_kerja', "$this->params")->where('status', 'diterima')->orWhere('status', 'interview');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Tanngal Lahir',
            'NIK',
            'Umur',
            'Jenis Kelamin',
            'Kewarganegaraan',
            'No Telepon',
            'Email',
            'Link Portofolio',
            'Link Medsos',
            'Sudah Bekerja',
            '',
            '',
            '',
            'KTP',
            'Foto',
            'CV',
            'Kelebihan dan Kekurangan',
            'Skill',
            'Skill Tambahan',
            'Created At',
            '',
            'Score Pilgan'
        ];
    }
}
