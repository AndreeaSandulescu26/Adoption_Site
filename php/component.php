<?php

function component($petname, $petprice, $petimg, $petid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$petimg\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$petname</h5>
                            <h6>
                                <span class=\"price\">$$petprice</span>
                            </h6>

                            <button type=\"submit\" class=\"btn mb-5 text-uppercase\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type='hidden' name='pet_id' value='$petid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($petimg, $petname, $petprice, $petid){
    $element = "
    
    <form action=\"index.php?action=remove&id=$petid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3\">
                                <img src=$petimg class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6 py-5\">
                                <h5 class=\"pt-2\">$petname</h5>
                                <h5 class=\"pt-2\">$$petprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                           
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}





