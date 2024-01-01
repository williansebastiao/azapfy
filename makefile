include .env

SHELL := /bin/bash
.DEFAULT_GOAL := help
DOCKER_COMPOSE := docker-compose

.PHONY: help start build stop refresh migrate storage-permission container

help:
	@echo "AZAPFY Makefile"
	@echo "---------------------"
	@echo "Usage: make <command>"
	@echo ""
	@echo "Commands:"
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[36m%-26s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

start: ## Start all containers
	$(DOCKER_COMPOSE) up -d

build: ## Build all containers
	$(DOCKER_COMPOSE) up --build

stop: ## Stop all containers
	$(DOCKER_COMPOSE) down

refresh: ## Refresh all migration
	$(DOCKER_COMPOSE) exec app php artisan migrate:refresh

migrate: ## Make migration
	$(DOCKER_COMPOSE) exec app php artisan migrate

storage-permission: ## Set permission for storage folder
	$(DOCKER_COMPOSE) exec app chmod -R 777 storage

container: ## Enter the container
	docker exec -it azapfy-app bash
