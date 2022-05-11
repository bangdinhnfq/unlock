<?php

namespace Bangdinhnfq\Unlock\Manager;

use Bangdinhnfq\Unlock\File\FileReader;
use Bangdinhnfq\Unlock\Models\Movie;

class MovieManager
{
    /**
     * @var FileReader
     */
    private FileReader $fileReader;

    /**
     * @param FileReader $fileReader
     */
    public function __construct(FileReader $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    /**
     * @param string $genre
     * @return array
     */
    public function getAllMovies(string $genre): array
    {
        $movies = $this->fileReader->read($genre);
        $results = [];
        foreach ($movies as $movieAsArray){
            $movie = new Movie();
            $movie->setId($movieAsArray['id']);
            $results[] = $movie;
        }

        return $results;
    }
}
