#!/bin/bash

# Exit codes:
#   0 - OK
#   1 - Unstable
# >=2 - Error

set -o errtrace



composer install --no-plugins --no-scripts --dev --no-progress

export PATH="./vendor/bin:$PATH"

mkdir ".reports"

echo "Running composer lint"
composer lint
exitCode=$?

if [[ $exitCode != 0 ]]; then
	echo "Linting the PHP source code FAILED with exit code $exitCode"
	exit 2
fi

# Run PHP CS Fixer
echo "Running php-cs-fixer"
php-cs-fixer fix --dry-run --format=junit > .reports/php-cs-fixer.xml

echo "Running phpunit"
phpunit -c phpunit.xml --coverage-clover .reports/phpunit.xml

echo "Running securitycheck"
composer securitycheck
exitCode=$?

if [[ $exitCode != 0 ]]; then
	echo "securitycheck returned exit code $exitCode"
	exit 1
fi
