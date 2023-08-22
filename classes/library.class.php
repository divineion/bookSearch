    <?php
require_once './index.php';
require_once './lib.php';
require_once 'classes/book.class.php';

    class Library {
        public array $books;
        public array $genres;

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

        public function getAllGenres() {
            foreach ($this->books as $book) {
                foreach ($book->genres as $theme) {
                  if (isset($this->genres[$theme])) {
                    $this->genres[$theme]+=1;
                  } else {
                    $this->genres[$theme]=1;
                  }
                }
                
            }           
        }


        public function getBooksByCategory($category) {
            $selectedBooks = [];
            foreach ($this->books as $book) {
                if (in_array($category, $book->genres)) {
                    $selectedBooks[] = $book;
                }
            }
            $this->books = $selectedBooks;
            return $selectedBooks;
            }
        

        
    }

    

     


        
?>

        
        
        
           
