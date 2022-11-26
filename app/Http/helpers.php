<?php
use App\Models\Category;


function category(){
    return Category::where('status','published')->get()->shuffle();
 }

?>
