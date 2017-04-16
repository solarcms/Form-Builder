<?php

namespace Paper\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crud
{

    private $table;

    function __construct($table)
    {
        $this->table = $table;
    }

    function create($data)
    {
        $r = DB::table($this->table)->insertGetId($data);
        return $r;
    }

    function read()
    {

    }

    function update()
    {

    }

    function delete()
    {
        $r = DB::table($this->table)->delete();
        return $r;
    }
}