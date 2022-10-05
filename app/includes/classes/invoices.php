<?php
class Invoices extends Db_object
{

    protected static $db_table = "invoices";
    protected static $db_table_fields = array(
        'invoice_number',
        'invoice_date_write',
        'invoice_date_payment',
        'client',
        'invoice_records_ids'
    );
    public $invoice_number;
    public $invoice_date_write;
    public $invoice_date_payment;
    public $client;
    public $invoice_records_ids;

    public function invoice_serial_number()
    {
        $sql = "SELECT invoice_number FROM invoices ORDER BY invoice_number DESC LIMIT 1";
        $results = self::find_by_query($sql);
        foreach ($results as $result)
        {
            return $result->invoice_number + 1;
        }
    }

}

$invoices = new Invoices();

?>
