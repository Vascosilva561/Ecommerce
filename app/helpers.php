<?php 

function presentPrice($price)
{
    //return number_format($price / 2);
    return number_format($price, 2, '.', ' ');
}