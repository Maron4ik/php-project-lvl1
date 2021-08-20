install:
	composer install

brain-games:
# 	@./bin/brain-games
	php bin/brain-games

validate:
	composer validate

status:
	git status






.PHONY: app test log doc