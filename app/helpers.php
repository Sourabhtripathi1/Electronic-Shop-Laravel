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
    return $id;
}

function getImage($id, $variants, $picture)
{
    return $id;
}
