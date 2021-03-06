<?php

namespace App\Models;

/**
 * Eloquent class to describe the bancas table.
 *
 * automatically generated by ModelGenerator.php
 */
class Bancas extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'bancas';

    protected $fillable = ['nome_banca', 'deleted_at'];

    public static $rules = [
        'nome_banca' => 'required|unique:bancas|max:255',
    ];

    public function getDates()
    {
        return ['deleted_at'];
    }

    public function questoes()
    {
        return $this->hasMany('App\Models\Questoes', 'banca_id', 'id');
    }
}
