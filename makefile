###############################################################################
##
## MAKEFILE for Symfony Forum
## by Dallin Lauritzen
## 
###############################################################################

# My Mac (dev) and Linux (prod) machines use different PHP binaries.
# This makes the targets the same by switching.
ifeq ('$(shell uname)','Darwin')
PHP = php
else
PHP = php-5.3
endif

info:
	@echo "OSys = '$(shell uname)' so PHP = $(PHP)"

###############################################################################
## PRODUCTION
##
## These targets should be run whenever deploying code or changing the
## database.
###############################################################################

# Reset the production cache. Use this from the server after deploying
cache:
	$(PHP) app/console --env=prod cache:clear
	$(PHP) app/console --env=prod cache:warmup

# Update the database from the current set of entity descriptions.
# If the production and development servers are different, run it after
# deploying, also.
SCHEMA_ACTION = --force
schema:
	$(PHP) app/console doctrine:schema:update $(SCHEMA_ACTION)

###############################################################################
## DEV
##
## These targets are to shortcut the commands used during development.
###############################################################################

# This opens the dialog to create a new bundle
bundle:
	$(PHP) app/console generate:bundle

# Update the Doctrine entities under a given bundle
BUNDLE_NAME = DLauritz
entities:
	$(PHP) app/console doctrine:generate:entities $(BUNDLE_NAME)

###############################################################################
## INSTALL
##
## These targets should only be run once while installing.
###############################################################################

# This should be run once after install and before opening web/config.php
MYNAME = `whoami`
WEBNAME = _www
permissions:
	sudo chmod +a "$(WEBNAME) allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
	sudo chmod +a "$(WEBNAME) allow delete,write,append,file_inherit,directory_inherit" app/config/parameters.ini
	sudo chmod +a "$(MYNAME) allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs

# This should be run once if a new database is used in parameters.ini
createdb:
	$(PHP) app/console doctrine:database:create

