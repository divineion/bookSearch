<?php
//créer la classe
class Book {
    
    //définir les propriétés
    public ?int $rank;
    public ?int $bookId;
    public ?string $title;
    public ?string $series;
    public ?string $numberOfSeries;
    public ?string $author;
    public ?string $authorLastFirst;
    public ?string $description;
    public ?string $language;
    public ?string $genres;
    public ?string $characters;
    public ?string $setting;
    public ?string $coverImg;
    public ?string $bookFormat;
    public ?string $edition;
    public ?int $pages;
    public ?string $publisher;
    public ?int $publishedYear;
    public ?int $firstPublishYear;
    public ?int $awards;
    public ?float $rating;
    public ?float $numRatings;
    public ?int $ISBN;
    public ?int $ISBN13;

    //initialiser les propriétés
    public function __construct(array $book) {
        $this->rank = $book['rank']; //floatval
        $this->bookId = $book['bookId'];
        $this->title = trim(strtolower($book['title']));
        $this->series = trim(strtolower($book['series']));
        $this->numberOfSeries = trim(strtolower($book['numberOfSeries']));
        $this->author = trim(strtolower($book['author']));
        $this->authorLastFirst = trim(strtolower($book['authorLastFirst']));
        $this->description = trim(strtolower($book['description']));
        $this->language = trim(strtolower($book['language']));
        $this->genres = trim(strtolower($book['genres']));
        $this->characters = trim(strtolower($book['characters']));
        $this->setting = trim(strtolower($book['setting']));
        $this->coverImg = $book['coverImg'];
        $this->bookFormat = trim(strtolower($book['bookFormat']));
        $this->edition = trim(strtolower($book['edition']));
        $this->pages = $book['pages'];
        $this->publisher = trim(strtolower($book['publisher']));
        $this->publishedYear = $book['publishedYear'];
        $this->firstPublishYear = (int) $book['firstPublishYear'];
        $this->awards = (int) $book['awards'];
        $this->rating = floatval($book['rating']);
        $this->numRatings = (int) $book['numRatings'];
        $this->ISBN = (int) $book['ISBN'];
        $this->ISBN13 = (int) $book['ISBN13'];
    }
}
?>