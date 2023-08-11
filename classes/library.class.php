    <?php
require_once './index.php';
require_once './lib.php';


    class Library {
        public array $books;

        public function __construct(array $books) {
            $this->books = $books;
        }

        public function sortByFilters(string $sortBy): array {
// Trier les livres avec la fonction usort
            usort($this->books, function ($a, $b) use ($sortBy) {
// function strcmp Compare two strings (case-sensitive)
                return strcmp($a->$sortBy, $b->$sortBy);
            });
                
                return $this->books;
        }
    }

    

     


        
?>

        
        
        
           
