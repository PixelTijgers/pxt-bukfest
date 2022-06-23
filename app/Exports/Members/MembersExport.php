<?php

// Namespacing.
namespace App\Exports\Members;

// Facades.
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

// Models.
use App\Models\Team;

class MembersExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach(Team::select(['id', 'name'])->get() as $team)
            $sheets[] = new MembersPerTeamExport($team);

        return $sheets;
    }
}
