#!/usr/bin/env make
# SHELL = sh -xv

WORKING_DIR := /chamber
DOCKER_RUN := docker run -w ${WORKING_DIR} -v "$(shell pwd):${WORKING_DIR}"

.PHONY: help
help:  ## Shows this help message
	@echo "\n  Usage: make [target]\n\n  Targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' "$(shell pwd)/Makefile" | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "    🔸 \033[36m%-30s\033[0m %s\n\n", $$1, $$2}'

.PHONY: composer-install
composer-install:
	${DOCKER_RUN} composer:2 composer install

.PHONY: test
test:
	${DOCKER_RUN} php:8.1-cli vendor/bin/phpunit
