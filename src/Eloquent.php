<?php

namespace Jgraffite\Snake2camel;
//use \Jgraffite\Snack2camel\QueryBuilder as QueryBuilder; // MyModel should now use your MyQueryBuilder instead of the default which I commented out above
use Illuminate\Database\Eloquent\Model as Model;;
use Illuminate\Support\Str;

class Eloquent extends Model
{
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();
        $grammar = $conn->getQueryGrammar();
        return new QueryBuilder($conn, $grammar, $conn->getPostProcessor());
    }

    //@override
    public function getAttribute($key)
    {
        return parent::getAttribute(Str::snake($key));
    }

    //@override
    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }


    /**
     * Converte valores de uma matriz de CamelCase para SnakeCase
     * @param $fields
     * @return array
     */
    public static function arrayCamelToSnakeCase($fields) {
        if (count($fields) == 0) return NULL;
        $newFields = [];
        foreach ($fields as $field) {
            $newFields[] = Str::snake($field);
        }
        return $newFields;
    }

    /*//@override
    public static function find($id, $columns = array()) {
        return parent::find($id, Eloquent::arrayCamelToSnakeCase($columns));
    }*/




    public function toArrayCamel($array = NULL) {
        if (is_null($array)) $array = parent::toArray();
        $return = array();
        foreach($array as $key => $value) {
            if (is_object($value) || is_array($value) ) {
                if (is_object($value) && property_exists($value, 'toJson')) $value = json_decode($value->toJson());
                $key = (is_numeric($key)) ? intval($key) : Str::camel($key);
                $return[$key] = (is_array($value)) ? $value : $this->toArrayCamel($value);

            }
            else {
                $key = (is_numeric($key)) ? intval($key) : Str::camel($key);
                $return[$key] = $value;
            }
        }
        return (object) $return;
    }

    //@override
    public function toArray($options = 0) {
        //return parent::toArray();
        if ($options === 'default') return parent::toArray();
        return $this->toArrayCamel();
    }


    /**
     * Selecionar algo de acordo com um FULL TEXT
     *
     * @param $fields
     * @param $keywords
     * @return mixed
     */
    public static function whereFullTextMatch($fields, $keywords)
    {
        $keyword = !is_array($keywords) ? array("'{$keywords}'") : $keywords;
        $matchArray = $fields;
        $columns = array();
        foreach($matchArray as $column)
        {
            $columns[] = Str::snake($column);
        }
        $match = implode(',', $columns);
        $result =  self::whereRaw('MATCH('.$match.') AGAINST (? IN BOOLEAN MODE)', $keyword);

        return $result;
    }


}
