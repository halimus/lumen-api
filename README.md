# lumen-api
Creating simple and secure lumen-api 

## Still under construction..

 
 **Next step :**
 - implement api-token for each user
 - implement limit rate
 - implement ip address authaurized
 - Implement pagination
 
 
 Error/HTTP response codes:

    200 OK: Success!
    304 Not Modified: There was no new data to return.
    400 Bad Request: The request was invalid. An accompanying error message will explain why.
    401 Unauthorized: Authentication credentials were incorrect.
    403 Forbidden: The request is understood, but it has been refused. This is the status code will be returned during rate limiting
    404 Not Found: The URI requested is invalid or the resource requested, such as a book, does not exists.
    406 Not Acceptable: Returned by the Search API when an invalid format is specified in the request.
    500 Internal Server Error: Something is broken. Please contact us if the situation continues and your request is valid
    502 Bad Gateway: our server is down or being upgraded.
    503 Service Unavailable: The our servers are up, but overloaded with requests. This is also the response code returned if a     book's details have been temporarily redacted

 
 



