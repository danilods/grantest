<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent class to describe the assuntos table.
 *
 * automatically generated by ModelGenerator.php
 */
class Assuntos extends Model
{
    protected $table = 'assuntos';

    protected $fillable = ['titulo_assunto', 'raiz_id', 'deleted_at'];

    public static $rules = [
        'titulo_assunto' => 'required|unique:assuntos|max:255',
    ];

    public function getDates()
    {
        return ['deleted_at'];
    }

    public function assunto()
    {
        return $this->belongsTo('App\Models\Assuntos', 'raiz_id', 'id');
    }

    public function assuntos()
    {
        return $this->hasMany('App\Models\Assuntos', 'raiz_id', 'id');
    }

    public function allChildrenAssuntos()
    {
        return $this->assuntos()->with('allChildrenAssuntos');
    }

    public function questoes()
    {
        return $this->hasMany('App\Models\Assuntos', 'assunto_id', 'id');
    }

    public function programaAssuntos()
    {
        return $this->hasMany('App\ProgramaAssuntos', 'assunto_id', 'id');
    }
}
