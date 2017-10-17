<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Returns seances, that goes in this room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seances()
    {
        return $this->belongsTo('App\Room');
    }
}
