install:
		composer install
		composer require --dev squizlabs/PHP_CodeSniffer
console:
	composer exec --verbose psysh
brain-games:
		./bin/brain-games
validate:
		composer validate
lint:
		composer run-script phpcs -- --standard=PSR12 src bin
		composer exec --verbose phpcs -- --standard=PSR12 src bin
