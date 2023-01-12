<?php

class User extends Model{
    protected static $tableName = 'usuarios';
    protected static $colunas = [
        'id',
        'nome',
        'senha',
        'email',
        'ativo',
        'tipo_login',
    ];
}