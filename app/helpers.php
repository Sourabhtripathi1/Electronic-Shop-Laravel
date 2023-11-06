<?php

function getCategory($id, $category)
{
    foreach ($category as $item) {
        if ($item['Category_id'] == $id) {
            return $item['Category_Name'];
        }
    }

    return $id;
}

function getBrand($id, $brand)
{
    foreach ($brand as $item) {
        if ($item['Category_id'] == $id) {
            return $item['Category_Name'];
        }
    }

    return $id;
}


function getPrice($id, $variants)
{

    $vars = array_values(array_filter($variants, function ($item) use ($id) {
        return $item['Product_id'] == $id;
    }));

    $price = array();

    foreach ($vars as $item) {
        array_push($price, $item['Price']);
    }


    return min($price);
}

function getImage($id, $variants, $picture)
{

    $vars = array_values(array_filter($variants, function ($item) use ($id) {
        return $item['Product_id'] == $id;
    }));

    $pics = json_decode($vars[0]['Picture'], true);

    $img = array_values(array_filter($picture, function ($item) use ($pics) {
        return $item['Picture_id'] == $pics[0];
    }))[0]['Source'];

    return $img;
}

function getProductNameFromVariant($id, $variants, $products)
{
    $vars  = collect($variants)->first(function ($item) use ($id) {
        return $item['variant_id'] == $id;
    });

    $na = getProductName($vars['Product_id'], $products);
    return $na;
}

function getFirstVariant($id, $products, $variants)
{
    $var = collect($variants)->first(function ($item) use ($id) {
        return $item["Product_id"] == $id;
    });

    return $var['variant_id'];
}

function getProductName($id, $products)
{
    $prod = collect($products)->first(function ($item) use ($id) {
        return $item['Product_id'] == $id;
    });

    return $prod['Product_name'];
}

function getVariantColor($id, $variants)
{
    $vars  = collect($variants)->first(function ($item) use ($id) {
        return $item['variant_id'] == $id;
    });

    return $vars['Color'];
}

function getVariantPrice($id, $variants)
{
    $vars  = collect($variants)->first(function ($item) use ($id) {
        return $item['variant_id'] == $id;
    });

    return $vars['Price'];
}

function getVariantStock($id, $variants)
{
    $vars  = collect($variants)->first(function ($item) use ($id) {
        return $item['variant_id'] == $id;
    });

    return $vars['Stock'];
}


function getVariantImage($id, $variants, $picture)
{

    $vars = collect($variants)->first(function ($item) use ($id) {
        return $item['variant_id'] == $id;
    });

    $pics = json_decode($vars['Picture'], true);

    $img = array_values(array_filter($picture, function ($item) use ($pics) {
        if (array_search($item['Picture_id'], $pics) !== false) {
            return $item;
        }
    }));

    return $img[0]['Source'];
}

function getOrders($id, $order_details)
{
    $ord =  array_values(array_filter($order_details, function ($item) use ($id) {
        return $item['Order_id'] == $id;
    }));

    return $ord;
}

function getOrderCount($id,$orders)
{
    $ord =  array_values(array_filter($orders, function ($item) use ($id) {
        return $item['User_id'] == $id;
    }));

    return count($ord);
}

function getCatCount($id,$products){
    $cnt =  array_values(array_filter($products, function ($item) use ($id) {
        return $item['Category'] == $id;
    }));

    return count($cnt);
}

function getBrndCount($id,$products){
    $cnt =  array_values(array_filter($products, function ($item) use ($id) {
        return $item['Brand'] == $id;
    }));

    return count($cnt);
}

function getAllCat($category){
    $cat=[];

    foreach ($category as $item) {
        array_push($cat,$item['Category_id']);
    }

    return $cat;
}

function getAllBrand($brnd){

    $br=[];

    foreach ($brnd as $item) {
        array_push($br,$item['Brand_id']);
    }

    return $br;
}


