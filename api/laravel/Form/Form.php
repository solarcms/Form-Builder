<?php

namespace Paper\Form;

use Exception;
use Illuminate\Support\Facades\DB;

class Form
{
    private $table, $config;

    function __construct($table = null)
    {
        if ($table !== null)
            $this->table = $table;
        else
            throw new Exception('No table selected');
    }

    function getConfig()
    {
        $this->config = DB::table('form_configurations')->where('table_name', $this->table)->first();
        $this->config->schema = DB::table('form_schemas')->where('table_id', $this->config->id)->get();
        return json_encode($this->config, true);
    }

    function validate($data)
    {
        dump($data);
        dump($this->config);
    }

    function crud($action, $data)
    {
        $db = new Crud($this->table);
        if (!method_exists($db, $action))
            throw new Exception('Method not found!');

        $db->$action($data);
    }
}