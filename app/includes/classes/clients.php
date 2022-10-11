<?php
class Clients extends Db_object
{

    protected static $db_table = "clients";
    protected static $db_table_fields = array(
        'id',
        'client',
        'price_list',
        'payment_term'
    );
    public $id;
    public $client;
    public $price_list;
    public $payment_term;

    public function client_payment_date($client)
    {
        $sql = "SELECT payment_term FROM clients WHERE client = '$client' LIMIT 1";
        $results = self::find_by_query($sql);
        foreach ($results as $result)
        {
            return $result->payment_term;
        }

    }

} //END of Class Clients

$clients = new Clients();

?>
