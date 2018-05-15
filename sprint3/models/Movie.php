<?php

namespace app\models;

use yii\db\ActiveRecord;

class Movie extends ActiveRecord
{

    const MOVIE_DATA_FILE = __DIR__."/../data/sepm.dat";

    public $movies;

    private function getContentsFromFile()
    {
        try {
            if (file_exists(self::MOVIE_DATA_FILE)) {
                $file = file_get_contents(self::MOVIE_DATA_FILE);
                return json_decode($file, true);
            }
            throw new \Exception("file is not exists");
        } catch(\Exception $e) {
            echo $e;
        }
        return false;
    }

    public function getAllMovies()
    {
        return $this->getContentsFromFile();
    }

    public function getMoviesByName($movieName)
    {
        $movies = $this->getContentsFromFile();
        $results = [];
        foreach($movies as $movie) {
            if (preg_match("/".$movieName."/si", $movie['title'])) {
                $results[] = $movie;
            }
        }
        return $results;
    }

    public function getMoviesByDatetime($movieDatetime)
    {
        $movies = $this->getContentsFromFile();
        $results = [];
        foreach($movies as $movie) {
            if (in_array($movieDatetime, $movie['playing_time'])) {
                $results[] = $movie;
            }
        }
        return $results;
    }

    public function getMoviesByNameAndDatetime($movieName, $movieDatetime)
    {
        $movies = $this->getContentsFromFile();
        $results = [];
        foreach($movies as $movie) {
            if (in_array($movieDatetime, $movie['playing_time'])) { 
                if (preg_match("/".$movieName."/si", $movie['title'])) {
                    $results[] = $movie;
                }
            }
        }
        return $results;
    }

    public function getAllMoviesPlaytime()
    {
        $movies = $this->getContentsFromFile();
        $results = [];
        foreach($movies as $movie) {
            $playtime = $movie['playing_time'];
            $results = array_merge($results, $playtime);
        }
        return array_unique($results);
    }

    public function getMovieById($id)
    {
        $movies = $this->getContentsFromFile();
        foreach($movies as $movie) {
            if ($movie['id'] == $id) {
                return $movie;
            }
        }
        return [];
    }

    public function lockSeats($id, $date, $time, $allSeats) {
        $movies = $this->getContentsFromFile(); 
        $seats = [];
        foreach ($allSeats as $seat) {
            $seats[] = substr($seat, 5);
        }
        $result = [];
        foreach($movies as $movie) {
            if ($movie['id'] == $id) {
                if (in_array($time, $movie['playing_time'])) {
                    if (array_key_exists($date." ".$time, $movie['seats'])) {
                        $movie['seats'][$date." ".$time] = array_unique(array_merge($movie['seats'][$date." ".$time], $seats));
                    } else {
                        $movie['seats'][$date." ".$time] = $seats;
                    }
                }
            }
            $result[] = $movie;
        }
        file_put_contents(self::MOVIE_DATA_FILE, json_encode($result));
        return true;
    }

    public function generateData()
    {
        $movies =array (
          0 => 
          array (
            'id' => 1,
            'theater' => 'Hall#1',
            'title' => 'Tully',
            'subtitle' => 'Tully',
            'post' => 'web/images/movies/1.jpg',
            'big_post' => 'web/images/movies/1.jpg',
            'price' => '22.99',
            'description' => 'The film is about Marlo, a mother of three including a newborn, who is gifted a night nanny by her brother. Hesitant to the extravagance at first, Marlo comes to form a unique bond with the thoughtful, surprising, and sometimes challenging young nanny named Tully.',
            'playing_time' => 
            array (
              0 => '11:00AM - 02:00PM',
              1 => '02:00PM - 05:00PM',
              2 => '05:00PM - 08:00PM',
              3 => '08:00PM - 11:00PM',
            ),
            'seats' => 
              array (
                '11/05/2018 11:00AM - 02:00PM' => 
                array (
                  0 => '1-5',
                  1 => '2-6',
                  2 => '5-3',
                ),
              ),
          ),
          1 => 
          array (
            'id' => 2,
            'theater' => 'Hall#2',
            'title' => 'Overboard',
            'subtitle' => 'Overboard',
            'post' => 'web/images/movies/2.jpg',
            'big_post' => 'web/images/movies/2.jpg',
            'price' => '20.00',
            'description' => 'A spoiled, wealthy yacht owner is thrown overboard and becomes the target of revenge from his mistreated employee.',
            'playing_time' => 
            array (
              0 => '11:00AM - 02:00PM',
              1 => '02:00PM - 05:00PM',
              2 => '05:00PM - 08:00PM',
              3 => '08:00PM - 11:00PM',
            ),
            'seats' => 
              array (
                '11/05/2018 11:00AM - 02:00PM' => 
                array (
                  0 => '3-6',
                  1 => '2-8',
                  2 => '5-4',
                ),
              ),
          ),
          2 => 
          array (
            'id' => 3,
            'theater' => 'Hall#3',
            'title' => 'Les gardiennes',
            'subtitle' => 'Les gardiennes',
            'post' => 'web/images/movies/3.jpg',
            'big_post' => 'web/images/movies/3.jpg',
            'price' => '18.00',
            'description' => 'Women are left behind to work a family farm during the Great War.',
            'playing_time' => 
            array (
              0 => '11:00AM - 02:00PM',
              1 => '02:00PM - 05:00PM',
              2 => '05:00PM - 08:00PM',
              3 => '08:00PM - 11:00PM',
            ),
            'seats' => 
              array (
                '11/05/2018 11:00AM - 02:00PM' => 
                array (
                  0 => '2-1',
                  1 => '2-2',
                  2 => '2-3',
                ),
              ),
          ),
          3 => 
          array (
            'id' => 4,
            'theater' => 'Hall#4',
            'title' => 'Acrimony',
            'subtitle' => 'Acrimony',
            'post' => 'web/images/movies/4.jpg',
            'big_post' => 'web/images/movies/4.jpg',
            'price' => '16.00',
            'description' => 'A faithful wife, tired of standing by her devious husband, is enraged when it becomes clear she has been betrayed.',
            'playing_time' => 
            array (
              0 => '08:00AM - 10:00PM',
              1 => '02:00PM - 05:00PM',
              2 => '05:00PM - 08:00PM',
              3 => '08:00PM - 11:00PM',
            ),
            'seats' => 
              array (
                '11/05/2018 11:00AM - 02:00PM' => 
                array (
                  0 => '3-5',
                  1 => '3-4',
                  2 => '3-6',
                ),
              ),
          ),
          4 => 
          array (
            'id' => 5,
            'theater' => 'Hall#5',
            'title' => 'Life of the Party',
            'subtitle' => 'Life of the Party',
            'post' => 'web/images/movies/5.jpg',
            'big_post' => 'web/images/movies/5.jpg',
            'price' => '25.00',
            'description' => 'After her husband abruptly asks for a divorce, a middle-aged mother returns to college in order to complete her degree.',
            'playing_time' => 
            array (
              0 => '11:00AM - 02:00PM',
              1 => '02:00PM - 05:00PM',
              2 => '05:00PM - 08:00PM',
              3 => '08:00PM - 11:00PM',
            ),
            'seats' => 
              array (
                '11/05/2018 11:00AM - 02:00PM' => 
                array (
                  0 => '4-3',
                  1 => '4-4',
                  2 => '4-5',
                ),
              ),
          ),
        ); 
        $movies = json_encode($movies);
        file_put_contents(self::MOVIE_DATA_FILE, $movies);
    }
   
}
