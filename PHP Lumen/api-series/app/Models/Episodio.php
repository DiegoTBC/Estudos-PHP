<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    /* Jeito de fazer casting de tipos no eloquente*/
    protected $casts = [
        'assistido' => 'boolean',
        'temporada' => 'int',
        'numero' => 'int',
        'serie_id' => 'int',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    /* Accessors: formata o atributo quando acessado */
    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

}
