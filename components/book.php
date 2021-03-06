<?php include "./php/db.php" ?>
<?php include "./php/helper.php" ?>

<style>
  .book{
    position: relative;
    border-radius: 5px;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    font-family: 'SF Pro';
    transition: 0.2s;
  }
  .book:hover{
    box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 20px;
    border-radius: 5px;
  }
  .book a{
    text-decoration: none;
  }
  .book .book-name{
    font-size: 1.1rem;
    font-weight: 600;
  }
  .book .book-price{
    font-size: 1rem;
    color: #555;
  }
  .book a:hover > .book-name{
    text-decoration: none;
    color: #87574b;
  }
  .book:hover > a .book-img{
    transform: scale(1.03);
  }
  .book .book-img{
    width: auto;
    max-height: 15rem;
    transition: 0.2s;
  }
  .book form .book-btn{
    margin-top: 1rem;
    background-color: #87574b;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.2s;
  }
  .book form .book-btn:hover{
    background-color: #6e473e;
  }
  .book .book-btn .book-cart-icon{
    stroke: white;
    width: 17px;
  }
  .book .fav-btn{
    border: none;
    background-color: transparent;
    padding: 0.5rem;
  }
  .book .fav-btn{
    color: #87574b;
  }

  @media only screen and (max-width: 575px){
    .book .book-img{
      width: 100%;
      /* max-height: 15rem; */
    }
  }
</style>

<?php

function book($isbn, $size){
  global $q;
  $data = get("SELECT * FROM books WHERE isbn=$isbn");
  $imageName = get("SELECT image FROM book_images WHERE isbn=$isbn")["image"];
  // charactor range
  $range = 13;
  // limit book name charactors to display in a book component
  $name = (strlen($data["name"]) > $range) ? substr($data["name"], 0, $range)."...":$data["name"];
  $book = "
    <div class=\"col-6 col-sm-4 col-lg-$size mb-2\">
      <div class=\"book border d-grid p-3\">
        <a href=\"view.php?isbn=$isbn\" class=\"d-flex justify-content-center\"><img src=\"data/$imageName\" class=\"book-img\" alt=\"image\"></a>
        <div class=\"row align-items-center\">
          <div class=\"col\">
            <a href=\"view.php?isbn=$isbn\"><h5 class=\"mb-0 book-name\">".$name."</h5></a>
            <span class=\"book-price\">Rs. ".number_format($data["price"], 2)."</span>
          </div>
          <div class=\"col-auto d-none\">
            <form action=".$_SERVER['PHP_SELF']." method=\"get\" class=\"d-grid mb-0\">
              <input type=\"hidden\" name=\"fav\" value=\"$isbn\">
              <input type=\"hidden\" name=\"q\" value=\"$q\">
              <button class=\"fav-btn\"><i class=\"bi bi-heart\"></i></button>
            </form>
          </div>
        </div>
          <form action=\"php/addToCart.php\" method=\"get\" target=\"_blank\" class=\"d-grid mb-0\">
            <input type=\"hidden\" name=\"isbn\" value=\"$isbn\">
            <input type=\"hidden\" name=\"quantity\" value=\"1\">
            <button type=\"submit\" value=\"Submit\" class=\"d-flex align-items-center justify-content-center p-1 book-btn\">
              <object data=\"assets/svg/cart.svg\" type=\"image/svg+xml\" class=\"book-cart-icon\"></object>&nbsp;Add to cart
            </button>
          </form>
      </div>
    </div>
  ";
  echo $book;
}
?>