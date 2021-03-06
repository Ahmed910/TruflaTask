## Trufla Task
### First Function
In This task ,I used external API or web service (themoviedb),firstly to call an external web service from laravel application,I used guzzlehttp package using composer and send request with get method to fetch top rated movies and get that data,secondly genre ids contains mult values data,so I searched about the api that returned all genres list,creating table for movies and another table for genres which called it (categories),after that I created intermdiate table which called it (categories_movies) and store fetched data
to tables :
- movies
- categories
- categories_movies

you can get the route to do this function in web.php file and route called (top-rated-movies) .

also create cron job to run every hour,with command called (TopRatedMovies)


### Second Function
create endpoint to list all movies .

you can get the route to do this function in web.php file and route called (all_movies)

### Third Function
User can search about movies by category,
category ID sent in get url for example
/movies?category_id=5

you can get the route to do this function in web.php file and route called (movies)

### Fourth Function
sort movies by popularity property descending and vote count ascending .

you can get the route to do this function in web.php file and route called (sort-movies)

# install dependencies
composer
## application installation 
composer create-project --prefer-dist laravel/laravel TruflaTask "5.8.*"

## setup HTTPGUZZLE package
composer require guzzlehttp/guzzle


