<?php

namespace App;

/**
 * Eloquent class to describe the questoes table.
 *
 * automatically generated by ModelGenerator.php
 */
class Questoes extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'questoes';

    protected $fillable = ['cod_questao', 'enunciado', 'modalidade', 'ano', 'deleted_at'];

    public function getDates()
    {
        return ['deleted_at'];
    }

    public function assuntos()
    {
        return $this->belongsTo('App\Assuntos', 'assunto_id', 'id');
    }

    public function bancas()
    {
        return $this->belongsTo('App\Bancas', 'banca_id', 'id');
    }

    public function orgaos()
    {
        return $this->belongsTo('App\Orgaos', 'orgao_id', 'id');
    }

    public function itemQuestoes()
    {
        return $this->hasMany('App\ItemQuestoes', 'questao_id', 'id');
    }
}
