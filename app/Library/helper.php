<?php

use App\Model\Invoice;

function pre($array, $exit = true)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if ($exit) {
        exit();
    }
}

function getInvoiceCombination($invoice_id)
{
    $invoice = Invoice::find($invoice_id);
    $client_name = $invoice->client->name;
    $date = date_format(date_create($invoice->date), 'd M y');
    return $invoice_id . ' - ' . $client_name . ' - ' . $date;
}

function getCurrency($client)
{
    $symbol = "₹";
    if (model($client, 'billing_currency') == 'usd') {
        $symbol = "$";
    }
    if (model($client, 'billing_currency') == 'eur') {
        $symbol = "€";
    }
    
    return $symbol;
}

function checkTaxableAmount($total, $tax) 
{
    $sub_total = 0.00;
    if ($tax) {
        $sub_total = $total * $tax / 100;
    }
    return number_format($sub_total, 2);
}

/**
 * output value if found in object or array
 * @param  [object/array] $model             Eloquent model, object or array
 * @param  [string] $key
 * @param  [boolean] $alternative_value
 * @return [type]
 */
function model($model, $key, $alternative_value = null, $type = 'object', $pluck = false)
{
    if ($pluck) {
      $count = $model;
      $array = array();
      if ($count && count($count)) {
        $array = $count->pluck($key)->toArray();
      }

      if (count($array)) {
        return implode(',', $array);
      }

      return $alternative_value;
    }

    if ($type == 'object') {
        if (isset($model->$key)) {
            return $model->$key;
        }
    }

    if ($type == 'array') {
        if (isset($model[$key]) && $model[$key]) {
            return $model[$key];
        }
    }

    return $alternative_value;
}

function setName($name)
{
    $output = str_replace(" ", "-", $name);
    $output = str_replace("_", "-", $output);
    return $output;
}

function prepareResult($status, $data, $msg, $redirect_URL = NULL)
{
    return response()->json(['status' => $status, 'data' => $data, 'message' => $msg, 'redirect' => $redirect_URL]);
}