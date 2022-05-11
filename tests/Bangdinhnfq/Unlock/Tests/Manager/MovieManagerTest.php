<?php

namespace Bangdinhnfq\Unlock\Tests\Manager;

use Bangdinhnfq\Unlock\File\FileReader;
use Bangdinhnfq\Unlock\Manager\MovieManager;
use Bangdinhnfq\Unlock\Models\Movie;
use PHPUnit\Framework\TestCase;

class MovieManagerTest extends TestCase
{
    /**
     * @dataProvider getAllMoviesDataProvider
     * @return void
     */
    public function testGetAllMovies($params, $expected)
    {
        $fileReader = $this->getMockBuilder(FileReader::class)->getMock();
        $fileReader->expects($this->once())->method('read')->willReturn($params['movies']);
        $movieManager = new MovieManager($fileReader);
        $movies = $movieManager->getAllMovies('action');
        $this->assertEquals(
            $expected,
            $movies
        );
    }

    /**
     * @return array[]
     */
    public function getAllMoviesDataProvider(): array
    {
        $movie1 = new Movie();
        $movie1->setId(1);
        $movie2 = new Movie();
        $movie2->setId(2);
        $movie3 = new Movie();
        $movie3->setId(3);

        return [
            'return-movies' => [
                'params' => [
                    'movies' => [
                        [
                            'id' => 1,
                        ],
                        [
                            'id' => 2,
                        ],
                        [
                            'id' => 3,
                        ]
                    ]
                ],
                'expected' => [
                    $movie1,
                    $movie2,
                    $movie3,
                ],
            ],
            'return-movies-2' => [
                'params' => [
                    'movies' => [
                        [
                            'id' => 1,
                        ],
                        [
                            'id' => 2,
                        ],
                        [
                            'id' => 3,
                        ]
                    ]
                ],
                'expected' => [
                    $movie1,
                    $movie2,
                    $movie3,
                ],
            ]
        ];
    }
}
