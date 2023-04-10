<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'passenger';

    /**
     * The primary key associated with the table.
     *
     * @var string
     * protected $primaryKey = "id"
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['full_name', 'cpf'];
}
