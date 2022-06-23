<?php

namespace App\Exports\Members;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;

// Models.
use App\Models\Member;

class MembersPerTeamExport implements FromQuery, WithTitle, ShouldAutoSize, WithHeadings, WithStyles, WithMapping
{
    private $team;

    public function __construct($team)
    {
        $this->team = $team;
    }
    /**
     * @return Builder
     */
    public function query()
    {
        return $member = Member::query()
                    ->select([
                        'name',
                        'street',
                        'zip_code',
                        'location',
                        'country',
                        'email',
                        'phone',
                        'mobile',
                        'birthday'
                    ])
                    ->where('team_id', $this->team['id']);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->team['name'];
    }

    public function headings(): array
    {
        return [
            'Naam:',
            'Straat:',
            'Postcode:',
            'Plaats:',
            'Land:',
            'E-mail adres:',
            'Telefoonnummer:',
            'Mobiel nummer:',
            'Geboortedatum:'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
    }

    /**
     * @var Invoice $invoice
     */
    public function map($member): array
    {
        return [
            $member->name,
            $member->street,
            $member->zip_code,
            $member->location,
            $member->country,
            $member->email,
            $member->phone,
            $member->mobile,
            $member->birthday->formatLocalized('%d-%m-%Y'),
        ];
    }
}
