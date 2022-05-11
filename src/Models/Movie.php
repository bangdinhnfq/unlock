<?php

namespace Bangdinhnfq\Unlock\Models;

class Movie
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var array
     */
    protected array $characters;

    /**
     * @var string
     */
    protected string $plot;

    /**
     * @var int
     */
    protected int $rating;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param array $characters
     * @return Movie
     */
    public function setCharacters(array $characters): Movie
    {
        $this->characters = $characters;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlot(): string
    {
        return $this->plot;
    }

    /**
     * @param string $plot
     * @return Movie
     */
    public function setPlot(string $plot): Movie
    {
        $this->plot = $plot;
        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     * @return Movie
     */
    public function setRating(int $rating): Movie
    {
        $this->rating = $rating;
        return $this;
    }
}
