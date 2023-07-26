<?php

namespace App\DTO;

class OrderDTO
{
    public string $order_id;
	public string $order_unique;
	public string $site_client_id;
	public string $account_id;
	public string $client_id;
	public string $currency;
	public string $store_name;
	public string $tracking_number;
	public string $shipping_adress;
	public string $shipping_city;
	public string $shipping_state;
	public string $shipping_country;
	public string $shipping_street;
	public string $shipping_zip;
	public string $lang_id;
	public string $order_date;
	public string $due_date;
	public string $discount_rate;
	public string $discount_sum;
	public string $shipping_type_id;
	public string $shiping_name;
	public string $shipping_price;
	public string $final_price;
	public string $status;
	public string $hide_recieved;
	public string $comments;
	public string $recipents;
	public string $update_date;
	public string $archived;
	public array $data;
	public string $id;
	public string $buyer_name;
	public string $shop_username;
	public int $calculated_price;
	public array $products;

    public function __construct(array $data)
    {
        $this->data = $data['data'];
        $this->order_id = $data['order_id'];
        $this->order_unique = $data['order_unique'];
        $this->site_client_id = $data['site_client_id'];
        $this->account_id = $data['account_id'];
        $this->client_id = $data['client_id'];
        $this->currency = $data['currency'];
        $this->store_name = $data['store_name'];
        $this->tracking_number = $data['tracking_number'];
        $this->shipping_adress = $data['shipping_adress'];
        $this->shipping_city = $data['shipping_city'];
        $this->shipping_state = $data['shipping_state'];
        $this->shipping_country = $data['shipping_country'];
        $this->shipping_street = $data['shipping_street'];
        $this->shipping_zip = $data['shipping_zip'];
        $this->lang_id = $data['lang_id'];
        $this->order_date = $data['order_date'];
        $this->due_date = $data['due_date'];
        $this->discount_rate = $data['discount_rate'];
        $this->discount_sum = $data['discount_sum'];
        $this->shipping_type_id = $data['shipping_type_id'];
        $this->shiping_name = $data['shiping_name'];
        $this->shipping_price = $data['shipping_price'];
        $this->final_price = $data['final_price'];
        $this->status = $data['status'];
        $this->hide_recieved = $data['hide_recieved'];
        $this->comments = $data['comments'];
        $this->recipents = $data['recipents'];
        $this->update_date = $data['update_date'];
        $this->archived = $data['archived'];
        $this->id = $data['id'];
        $this->buyer_name = $data['buyer_name'];
        $this->shop_username = $data['shop_username'];
        $this->calculated_price = $data['calculated_price'];
        foreach ($data['products'] as $product) {
            $this->products[] = new ProductDTO($product);
        }
    }

    

}