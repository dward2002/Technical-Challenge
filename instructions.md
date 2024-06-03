# Technical Requirements
- Install PHP 8.2 or higher https://www.php.net/manual/en/install.general.php

- Install Composer https://getcomposer.org/download/

- Install the Symfony CLI https://symfony.com/download



# Download Dependencies
In the project directory, you can run:

```composer install```

This command installs all of the required project dependencies.



# Main Functionality Location
The main functionality of the 'CheckerService' can be found under the 'src/Service' directory



# Testing
The tests can be found in the 'tests' directory

To run the unit tests use:

```./vendor/bin/phpunit```

To check the coverage use: 

```./vendor/bin/phpunit --coverage-html var/coverage```

- This will create a 'coverage' directory inside the 'var' directory.

- Inside the 'coverage' directory there will be an 'index.html' file.

- Open the 'index.html' file on your browser to see the coverage of the tests.



# API Endpoints
To run the local server use:

```symfony server:start```

This will start a local web server which can be accessed in your browser at 'localhost:8000'

Example endpoints you can try for each checker task.

```http://localhost:8000/anagram/dusty/study```

```http://localhost:8000/palindrome/anna```

```http://localhost:8000/pangram/The%20quick%20brown%20fox%20jumps%20over%20the%20lazy%20dog```



# Extra Features
As well as the core features of this technical challenge, I have added an example usage of the 'isAnagram' method of the 'CheckerService'.
This is done through the use of an example webpage, which allows you to make a 'POST' request asynchronously to check if two inputted words are an anagram of eachother.

The main functionalites of this additional task can be found in the following directories:

-'src/Controller/CheckerController.php'

-'templates\homepage\homepage.html.twig'

-'tests\controller\CheckerControllerTest.php'

To run the local server use:

```symfony server:start```

This will start a local web server which can be accessed in your browser at 'localhost:8000'

To end the local server use:

```symfony server:stop```

# Supporting Documentation

https://getbootstrap.com/docs/5.3/getting-started/introduction/

https://symfony.com/doc/6.0/index.html

https://docs.fontawesome.com/web/