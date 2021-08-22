install:
	composer install

brain-games:
	@#./bin/brain-games
	php bin/brain-games

brain-even:
	@#./bin/brain-even
	php bin/brain-even

brain-calc:
	@#./bin/brain-calc
	php bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin






.PHONY: app test log doc