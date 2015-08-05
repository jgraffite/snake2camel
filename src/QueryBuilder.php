<?php

namespace Jgraffite\Snake2camel;

use Illuminate\Database\Query\Builder as Builder;

class QueryBuilder extends Builder {

    //@override
    public function get($columns = array('*'))
    {
        for ($n=0;$n<count($columns);$n++) {
            $columns[$n] = (is_string($columns[$n])) ? snake_case($columns[$n]) : $columns[$n];
        }

        return parent::get($columns); // TODO: Change the autogenerated stub
    }

    public function orderBy($column, $direction = 'asc')
    {
        return parent::orderBy( (is_string($column)) ? snake_case($column) : $column , $direction); // TODO: Change the autogenerated stub
    }

    public function groupBy()
    {
        foreach(func_get_args() as $column) {
            $this->groups[] = (is_string($column)) ? snake_case($column) : $column;
        }
        return parent::groupBy(); // TODO: Change the autogenerated stub
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $column = (is_string($column)) ? snake_case($column) : $column;
        return parent::where($column, $operator, $value, $boolean); // TODO: Change the autogenerated stub
    }

    public function whereNull($column, $boolean = 'and', $not = false)
    {
        $column = (is_string($column)) ? snake_case($column) : $column;
        return parent::whereNull($column, $boolean, $not); // TODO: Change the autogenerated stub
    }

    public function whereIn($column, $values, $boolean = 'and', $not = false)
    {
        $column = (is_string($column)) ? snake_case($column) : $column;
        return parent::whereIn($column, $values, $boolean, $not); // TODO: Change the autogenerated stub
    }


}