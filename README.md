# Internet Game Db Rest API

Internet Game Db REST API, by Evan Daley. This is an implementation of a REST application programming interface, and allows custom searches for movie information using a variety of parameters. 

## URL 

http://evandaley.net/db2/api.php/[METHOD[?PARAMETERS]]

## Methods

| Method        | Url           | Action  |
| ------------- |:-------------:| -----:|
| GET      | evandaley.net/db2/get | Retrieves all movies |
| POST      | evandaley.net/db2/get | Retrieves all movies |
| PUT      | evandaley.net/db2/get | Retrieves all movies |
| DELETE      | evandaley.net/db2/get | Retrieves all movies |
| OPTIONS      | evandaley.net/db2/options | Retrieves all movies |

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
Find a single movie by id. If no id is specified all valid entries will be returned.

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| -----:|
| id      | integer | null | Retrieves a single movie by id |

#### Movies by Query Term
Search for all movies where Title or Studio contains Term. If no term is specified all valid entries will be returned. 

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| -----:|
| term     | string | null | Retrieves a list of movies where Title or Studio is LIKE term |

#### Count
Instead of return the JSON list, return a count of the list. 

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| -----:|
| count     | bool | false | Retrieves a count of found movies |


## Update method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 


## Examples
| Method        | Url           | Action  |
| ------------- |:-------------:| -----:|
| GET     | evandaley.net/db2/get      |   Searches for movies with 'Rome' in their name |
| GET | evandaley.net/db2/get/?count=true      |    Searches for all movies and returns the count of result |
