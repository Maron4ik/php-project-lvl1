install:
	composer install

brain-games:
	@./bin/brain-games

validate:
	composer validate $(FILE)




.PHONY: app test log doc