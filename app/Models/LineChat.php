<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineChat extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the latest 20 records where line_id and character_id match the given parameters.
     *
     * @param  string  $lineId
     * @param  string  $characterId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLatestRecords($lineId, $characterId)
    {
        $records = self::where('line_id', $lineId)
            ->where('character_id', $characterId)
            ->latest()
            ->select('question', 'answer')
            ->take(20)
            ->get()
            ->map(function ($record) {
                return [
                    'question' => $record->question,
                    'answer' => $record->answer
                ];
            })
            ->toArray();

        $formatted = array_reverse($records, true);
        $formatted = array_values($formatted);

        return $formatted;
    }

}
