# Dockyard Web Application

## How to install

These instructions will instruct you how to install and run the web application.

### Prerequisites 

To run the application, JSON-Server (https://github.com/typicode/json-server) must be installed:

```
npm install -g json-server
```

Navigate to the home directory where db.json is located to start the server:

```
json-server --watch db.json
```

### Installation

Download the git repo, navigate to the dockyardapp folder and run the follow commands to start the server:

```
npm install
```

```
npm run build
```

```
npm run dev
```

Navigate to http://localhost:8080/ in your browser to use the web application.

## Backend REST API installation

Backend REST API uses Symfony as the framework and Doctorine as an ORM.

Import dockyard.sql into a MySQL database and start the server. Change the variables in the dockyard-backend\app\config\parameters.yml file to match your server.

Navigate to the dockyard-backend folder in the command prompt and install the dependencies by running:

```
composer update
```

Then generate the database tables by running:

```
php bin/console doctrine:schema:update --force
```

To start the server, run:

```
php bin/console server:run
```

The server should start on 127.0.0.1:8000/
