<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Revolution\Google\Sheets\Facades\Sheets;

/**
 * @class Requests
 * @namespace App\Models
 *
 * @property-read integer $id
 * @property string $url
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Requests extends Model
{
    use HasFactory;

    protected $table = 'requests';
    protected $guarded = ['id'];
    protected $fillable = ['url'];

    public static function createRequest($values): void
    {
        $url = self::saveToSheet($values);
        self::create([
            'url' => $url
        ]);
    }

    /**
     * Save data to sheet
     * @props
     * @return string url
     */
    private static function saveToSheet($values): string
    {
        $sheetName = sprintf('%s-%s', Carbon::now()->format('Y-m-d-H-i-s'), $values['firstName']);

        $data = [
            [
                'First Name',
                $values['firstName'],
            ],
            [
                'Last Name',
                $values['lastName'],
            ],
            [
                'Phone Number',
                $values['phoneNumber'],
            ],
            [
                'Description',
                $values['description'],
            ]
        ];

        Sheets::spreadsheet(config('google.post_spreadsheet_id'))->addSheet($sheetName);
        Sheets::sheet($sheetName)->append($data);

        return sprintf("https://docs.google.com/spreadsheets/d/%s/edit#gid=%s", config('google.post_spreadsheet_id'), array_key_last(Sheets::sheetList()));
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->setTimezone('Europe/Moscow')->format('Y-m-d H:i:s');
    }
}
