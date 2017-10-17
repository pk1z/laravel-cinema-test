<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{

    /**
     * Returns the film, than shows on this seance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function films()
    {
        return $this->belongsTo('App\Films');
    }

    /**
     * Returns the room, in which than film plays
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }


    /**
     * Return all tickets of this seance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}

