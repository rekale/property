<?php

namespace App\Http\Controllers\Admin;

trait BubbleSortTrait
{
    public function sortAsc($items, $field)
    {
        for ( $i = 0; $i < $items->count(); $i++ ) {
           for ($j = 0; $j < $items->count(); $j++ ) {
              if ($items[$i]->{$field} < $items[$j]->{$field}){
                 $temp = $items[$i];
                 $items[$i] = $items[$j];
                 $items[$j] = $temp;
              }         
           }
        }

        return $items;
    }

    public function sortDesc($items, $field)
    {
        for ( $i = 0; $i < $items->count(); $i++ ) {
           for ($j = 0; $j < $items->count(); $j++ ) {
              if ($items[$i]->{$field} > $items[$j]->{$field}){
                 $temp = $items[$i];
                 $items[$i] = $items[$j];
                 $items[$j] = $temp;
              }         
           }
        }

        return $items;
    }
}
