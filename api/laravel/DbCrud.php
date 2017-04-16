<?php

namespace Form;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbCrud
{

    private $table;

    function __construct($table)
    {
        $this->table = $table;
    }

    function create(Request $request)
    {
        $data = $request->except('_token');
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