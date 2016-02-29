# Internet Game Db Rest API

Internet Game Db REST API, by Evan Daley. This is an implementation of a REST application programming interface, and allows custom searches for movie information using a variety of parameters. 

## URL 

http://evandaley.net/db2/[METHOD[?PARAMETERS]]

## Methods

| Method        | Url           | Action      |
| :------------- |:-------------| :-----|
| GET      | evandaley.net/db2/get | to retrieve and search entries |
| POST      | evandaley.net/db2/post | to add an entry |
| PUT      | evandaley.net/db2/put | to update an entry or add it if not found |
| DELETE      | evandaley.net/db2/delete | to delete an entry |
| OPTIONS      | evandaley.net/db2/options | to find the types of methods allowed by this API |

## Query method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

#### Single Movie by Identifier

Find a single movie by id. If no id is specified all valid entries will be returned.

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| :-----:|
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

## Post method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

#### Post Movie with Optional Fields

Create a single movie with title, studio, price, year. If any fields are left unspecified a value of "null" will be used.

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| :-----:|
| title      | string | null | Specify a title for the movie |
| studio      | string | null | Specify a studio for the movie |
| price      | decimal | null | Specify a price for the movie |
| year      | integer | null | Specify a year for the movie |

## Put method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

Post or Update an entry by ID. If the ID is in use the fields will be updated. If the ID does not exist a new entry will be cretaed. If any fields are left unspecified a value of "null" will be used.

| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| :-----:|
| id      | int | null | Specify the movie we want to update by ID. If ID is not found a new entry will be created. |
| title      | string | null | Specify a title for the movie |
| studio      | string | null | Specify a studio for the movie |
| price      | decimal | null | Specify a price for the movie |
| year      | integer | null | Specify a year for the movie |

## Delete method Parameters
These parameters should be submitted as key=value pairs using the HTTP GET method and may not be specified more than once; if a parameter is submitted multiple times the result is undefined. 

Delete a movie by ID. 
| parameter        | type           |   default    |  description  |
| ------------- |:-------------:|:-------------:| :-----:|
| id      |  int  |  null  |  Specify the movie we want to delete by ID |


## Further Examples
| Method        | Url           | Action  |
| :------------- |:-------------| :-----|
| GET     | evandaley.net/db2/get/?term=Rome      |   Searches for movies with 'Rome' in their title or studio |
| GET | evandaley.net/db2/get/?count=true      |    Searches for all movies and returns the count of result |
