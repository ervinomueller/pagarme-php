<?php
/**
 * Created by PhpStorm.
 * User: mueller
 * Date: 15/11/18
 * Time: 18:47
 */

namespace PagarMe\Sdk;


trait Arrayable
{
    public function toArray()
    {
        $vars  = get_object_vars($this);
        $array = array();
        foreach ($vars as $key => $value) {
            $array [ltrim($key, '_')] = $value;
        }
        return $array;
    }
}