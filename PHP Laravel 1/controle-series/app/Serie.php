<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //protected $table = 'series';
    public $timestamps = false;
    public $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

}
