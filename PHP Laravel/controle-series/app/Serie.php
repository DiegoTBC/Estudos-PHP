<?php


namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //protected $table = 'series';
    public $timestamps = false;
    public $fillable = ['nome', 'capa'];

    public function getCapaUrlAttribute()
    {
        if ($this->capa)
        {
            return Storage::url($this->capa);
        }

        return Storage::url('serie/sem-imagem.png');
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

}
