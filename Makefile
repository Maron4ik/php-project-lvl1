install:
	composer install

brain-games:
	@#./bin/brain-games
	php bin/brain-games

brain-even:
	@#./bin/brain-even
	php bin/brain-even

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin






.PHONY: app test log doc