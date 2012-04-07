
permissions:
	sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
	sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
	sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/config/parameters.ini

createdb:
	php app/console doctrine:database:create

BUNDLE_NAME = DLauritz
entities:
	php app/console doctrine:generate:entities $(BUNDLE_NAME)

SCHEMA_ACTION = --force
schema:
	php app/console doctrine:schema:update $(SCHEMA_ACTION)

