install:
	composer install

brain-games:
# 	@./bin/brain-games
	php bin/brain-games

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin






.PHONY: app test log doc