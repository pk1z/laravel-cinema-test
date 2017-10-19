<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{

    public $table = 'films';
    /**
     * Return seances, thouse goes with this film
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany('App\Seance', 'film_id');
    }
}
