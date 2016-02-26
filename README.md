# Internet Game Database Rest API
A simple REST API created by Evan Daley.

This is an implementation of a REST application programming interface, and allows custom searches for movie information using a variety of parameters. 

## URL 

http://evandaley.net/db2/api.php/[METHOD[?PARAMETERS]]

## Methods

#### GET
to retrieve and search data
#### POST
to add data
#### PUT
to update an entry or add it if not found
#### DELETE
to delete data
#### OPTIONS
to find the types of methods allowed by this API (GET, POST, PUT, DELETE, OPTIONS)

### Methods
| Method        | Url           | Action  |
| ------------- |:-------------:| -----:|
| GET      | api/movies | Retrieves all movies |
| GET     | api/movies/search/Rome     |   Searches for movies with 'Rome' in their name |
| GET | api/movies/count=true      |    Searches for all movies and returns the count of result |

