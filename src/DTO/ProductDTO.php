<?php

namespace App\DTO;

class ProductDTO
{
    public string $order_product_id;
    public string $site_client_id;
    public string $order_id;
    public string $product_id;
    public string $external;
    public string $title;
    public string $payment_id;
    public string $product_code;
    public string $buying_price;
    public string $original_price;
    public string $ammount;
    public string $comment;
    public string $listing_id;
    public string $stock_action_status;
    public string $stock_action_code;
    public string $lang_id;
    public string $update_date;
    public string $sku;

    public function __construct(array $data)
    {
        $this->order_product_id = $data['order_product_id'];
        $this->site_client_id = $data['site_client_id'];
        $this->order_id = $data['order_id'];
        $this->product_id = $data['product_id'];
        $this->external = $data['external'];
        $this->title = $data['title'];
        $this->payment_id = $data['payment_id'];
        $this->product_code = $data['product_code'];
        $this->buying_price = $data['buying_price'];
        $this->original_price = $data['original_price'];
        $this->ammount = $data['ammount'];
        $this->comment = $data['comment'];
        $this->listing_id = $data['listing_id'];
        $this->stock_action_status = $data['stock_action_status'];
        $this->stock_action_code = $data['stock_action_code'];
        $this->lang_id = $data['lang_id'];
        $this->update_date = $data['update_date'];
        $this->sku = $data['sku'];
    }

}