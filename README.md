# Howsy demo
This is a demo Laravel project created for [Howsy](https://www.howsy.com/) in a little more than an hour.

Please note that I have not implemented an authentication mechanism or a mechanism to validate the input of the requests.
## Installation
1. Clone the repository and install dependencies with Composer.
```shell
git clone https://github.com/babisp/Howsy-demo.git
composer install
```
2. Create a `.env` file and edit the database configuration. Also, add a Google API key at the end of the file.
```shell
cp .env.example .env
nano .env
```
3. Run the migrations to create the database schema.
```shell
php artisan migrate
```
## Usage
### Add a property
To add a property, do a `POST` request to the following endpoint:
```
/api/properties
```
You can include the following parameters in the body of the request:
```json
{
   "address_1":"Address Line 1",
   "address_2":"Address Line 2",
   "city":"City",
   "postcode":"Post code"
}
```
### List all properties
To list all properties, do a `GET` request to the following endpoint:
```
/api/properties
```
### Retrieve a specific property
To retrieve a specific property, do a `GET` request to the following endpoint:
```
/api/properties/{id}
```
where `id` is the id of the property as returned in the list endpoint.