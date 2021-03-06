<?php

namespace App\Console\Commands;

use App\Category;
use App\Movies;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class TopRatedMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top_rated:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Top Rated Movies From Moviesdb Web Service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client= new Client();
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated',
        ['headers' => [
            'Authorization' => "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwMTY5MzZhOTc5YzMwM2Y2ODA5M2ZhYTljYjg4MTJiYSIsInN1YiI6IjYwNDIyMTM4OGVmZTczMDA0NWEyMGNlZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AIKM5WrSWYeQqRLoCv0SOd2BvmBOcmnKeJ2vGvEH77A",
        ]]);

         $top_rated_data = json_decode($response->getBody());
         $top_rated_data= $top_rated_data->results;
        //  dd($top_rated_data);

         foreach($top_rated_data as $top_rated_movie)
         {

           $movie= Movies::create([
                'adult' => $top_rated_movie->adult,
                'backdrop_path'=>$top_rated_movie->backdrop_path,
                'original_language'=>$top_rated_movie->original_language,
                'original_title'=>$top_rated_movie->original_title,
                'overview'=>$top_rated_movie->overview,
                'popularity'=>$top_rated_movie->popularity,
                'poster_path'=>$top_rated_movie->poster_path,
                'release_date'=>$top_rated_movie->release_date,
                'title'=>$top_rated_movie->title,
                'video'=>$top_rated_movie->video,
                'vote_average'=>$top_rated_movie->vote_average,
                'vote_count'=>$top_rated_movie->vote_count
                ]);

            $movie->categories()->attach($top_rated_movie->genre_ids);


         }

         $response2 = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list',
         ['headers' => [
             'Authorization' => "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwMTY5MzZhOTc5YzMwM2Y2ODA5M2ZhYTljYjg4MTJiYSIsInN1YiI6IjYwNDIyMTM4OGVmZTczMDA0NWEyMGNlZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AIKM5WrSWYeQqRLoCv0SOd2BvmBOcmnKeJ2vGvEH77A",
         ]]);

          $genres = json_decode($response2->getBody());
          foreach($genres->genres as $genre){
            $categoryID= Category::create(['id'=>$genre->id,'name'=>$genre->name]);
          }

    }
}
