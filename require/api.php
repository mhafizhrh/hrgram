<?php
class Api
{
    public $api_url = 'http://rivalpanel.id/api/v2/'; // API URL
    
    public $api_key = 'RVLDX3BOAhzy8c7whpXSO9m'; // Your API key
    
    public function order($link, $type, $quantity) // Add order
    {
        return json_decode($this->connect(array(
            'api' => $this->api_key,
            'action' => 'add',
            'link' => $link,
            'service' => $type,
            'quantity' => $quantity
        )));
    }
    
    public function status($order_id) // Get status, remains
    {
        return json_decode($this->connect(array(
            'api' => $this->api_key,
            'action' => 'status',
            'order_id' => $order_id
        )));
    }
    
    
    private function connect($post)
    {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name . '=' . urlencode($value);
            }
        }
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        //echo $result;
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}

// Examples

//$api = new Api();
//
//$order = $api->order('https://www.instagram.com/p/BVsCsO6BlMA/', '3', '100'); // $link, $type - service type, $quantity: return order id or Error
//
//$status = $api->status($order->status);
?>