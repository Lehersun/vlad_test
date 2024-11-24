start:
	docker compose up -d
stop:
	docker compose down
restart:
	docker compose down
	docker compose up -d
init:
	docker compose up -d
	docker compose run api composer install
