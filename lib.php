<?php

require_once './classes/book.class.php';

function searchByTerms() {
   if (isset($_GET['search'])) {
   $searchTerms = $_GET['search'];
   $searchTerms = explode(' ', $searchTerms);
  
   }
}





?>