<?php

class Records extends Db_object
{

    protected static $db_table = "records";
    protected static $db_table_fields = array(
        'client',
        'record_insert_date',
        'record_update_date',
        'record_status',
        'record_quantity',
        'record_pricelist',
        'record_price',
        'record_layout_name',
        'record_material_name',
        'record_material_name',
        'record_dimension1',
        'record_dimension2',
        'record_area',
        'record_notes'
    );
    public $id;
    public $client;
    public $record_insert_date;
    public $record_update_date;
    public $record_status;
    public $record_quantity;
    public $record_pricelist;
    public $record_price;
    public $record_layout_name;
    public $record_material_name;
    public $record_material_width;
    public $record_dimension1;
    public $record_dimension2;
    public $record_area;
    public $record_notes;

}

$records = new Records();

?>
