<?php

// O model vai apontar para uma tabela no banco de dados
class Model {
    // Definindo o mapeamento com o banco de dados
    protected static $tableName = '';
    protected static $colunas = [];

    // Não vai ser static porque vai pertencer para cada uma das instâncias criadas
    protected $values = [];

    function __construct($arr) {
        $this->LoadFromArray($arr);
    }

    public function LoadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    //Métodos mágicos
    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    } //fim métodos mágicos

    //select final 1 registro
    public static function getOne($filters = [], $columns = '*'){
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
    }
    
    //select final
    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        
        if ($result){
            $class = get_called_class();

            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
        } 

        return $objects;
    }

    //construindo select
    public static function getResultSetFromSelect($filters = [], $columns = '*'){
        $sql = "SELECT $columns FROM " . static::$tableName . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);

        if($result->num_rows === 0){
            return null;
        } else{
            return $result;
        }
    }

    //tratando o where
    private static function getFilters($filters) {
        $sql = '';

        if(count($filters) > 0){
            $sql .= " WHERE 1 = 1";

            foreach($filters as $column => $value) {
                $sql .= " AND $column = " . static::getFormatedValue($value);
            }
        }

        return $sql;
    }

    //tratando string x int do where
    private static function getFormatedValue($value) {
        if(is_null($value)){
            return "null";
        } elseif(gettype($value) === 'string'){
            return "'$value'";
        } else{
            return $value;
        }
    }

}