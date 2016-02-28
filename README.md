# Internet Game Db Rest API

Internet Game Db REST API, by Evan Daley. This is an implementation of a REST application programming interface, and allows custom searches for movie information using a variety of parameters. 

## URL 

http://evandaley.net/db2/api.php/[METHOD[?PARAMETERS]]

## Methods

##### GET
to retrieve and search entries.
##### POST
to add an entry.
##### PUT
to update an entry or add it if not found.
##### DELETE
to delete an entry.
##### OPTIONS
to find the types of methods allowed by this API (GET, POST, PUT, DELETE, OPTIONS).

## Query method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

#### Single Movie by Identifier
If no id is specified all entries will be returned.

| Parameter        | type           |   default    |   description  |
| ------------- |:-------------:|:-------------:| -----:|
| id      | Integer | null | Retrieves all movies |


## Query method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

#### Single Movie by Identifier
If no id is specified all entries will be returned.

| Parameter        | type           | default  | description |
| ------------- |:-------------:| -----:|
| id      | Integer | null | Retrieves all movies |





##Other


| Method        | Url           | Action  |
| ------------- |:-------------:| -----:|
| GET      | api/movies | Retrieves all movies |
| GET     | api/movies/search/Rome     |   Searches for movies with 'Rome' in their name |
| GET | api/movies/count=true      |    Searches for all movies and returns the count of result |

