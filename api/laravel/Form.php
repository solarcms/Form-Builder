<?php

namespace Form;

use Exception;
use Form\DbCrud;
use Form\Builder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class Form
{
    private $table;

    function __construct($table = null)
    {
        if ($table !== null)
            $this->table = $table;
        else
            throw new Exception('No table selected');
    }

    function getConfig()
    {
        $config = DB::table('form_configurations')->where('table_name', $this->table)->first();
        $config->schema = DB::table('form_schemas')->where('table_id', $config->id)->get();
        return json_encode($config, true);
    }

    function action($actionType, $data)
    {

    }
}