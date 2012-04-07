ifeq ($(shell uname), 'Darwin')
PHP = php
else
PHP = php-5.3
endif

permissions:
	sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
	sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
	sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/config/parameters.ini

createdb:
	$(PHP) app/console doctrine:database:create

BUNDLE_NAME = DLauritz
entities:
	$(PHP) app/console doctrine:generate:entities $(BUNDLE_NAME)

SCHEMA_ACTION = --force
schema:
	$(PHP) app/console doctrine:schema:update $(SCHEMA_ACTION)

cache:
	$(PHP) app/console --env=prod cache:clear
	$(PHP) app/console --env=prod cache:warmup

