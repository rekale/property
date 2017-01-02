<?php

namespace App\Http\Controllers\Admin;

trait BubbleSortTrait
{
    public function sortAsc($items, $field)
    {
        $sorted = false;

        while (! $sorted) {
            $sorted = true;

            for ($i = 0; $i < $items->count() - 1; ++$i) {   
                
                 if ($items[$i]->{$field} > $items[$i+1]->{$field}) {
                    $temp = $items[$i];
                    $items[$i] = $items[$i + 1];
                    $items[$i + 1] = $temp;
                      
                    $sorted = false;
                }
            }

        }
        return $items;
    }

    public function sortDesc($items, $field)
    {
        $sorted = false;
        while (! $sorted) {
            $sorted = true;

            for ($i = 0; $i < $items->count() - 1; ++$i) {   
                if ($items[$i]->{$field} < $items[$i+1]->{$field}) {
                    $temp = $items[$i];
                    $items[$i] = $items[$i + 1];
                    $items[$i + 1] = $temp;
                      
                    $sorted = false;
                }
            }

        }
        return $items;
    }

}
