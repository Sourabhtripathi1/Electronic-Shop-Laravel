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
