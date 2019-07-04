<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    public function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    public function limit_word($text, $limit)
    {
        if (strlen($text) > $limit) {

            $text = substr($text, 0, $limit) . "...";
            // $text = strlen($text);
        }
        return $text;
    }
}
