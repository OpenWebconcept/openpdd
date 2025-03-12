#!/usr/bin/env bash
set -e # exit if something goes wrong

# Define the Bedrock directory
BEDROCK_DIR="bedrock"

# Define the environment variables
DB_NAME="openpdd"
DB_USER="wordpress"
DB_PASSWORD="wordpress"
DB_HOST="database"
WP_ENV="development"
WP_HOME="http://openpdd-new.lndo.site"
WP_SITEURL="${WP_HOME}/wp"

# Create the Bedrock directory if it doesn't exist
if [ ! -d "$BEDROCK_DIR" ]; then
  mkdir $BEDROCK_DIR
fi

# Navigate to the Bedrock directory
cd $BEDROCK_DIR

# Install the latest Bedrock
composer create-project roots/bedrock .

# Copy .env.example to .env and replace placeholders with actual values
cp .env.example .env
sed -i '' "s/DB_NAME='database_name'/DB_NAME='${DB_NAME}'/" .env
sed -i '' "s/DB_USER='database_user'/DB_USER='${DB_USER}'/" .env
sed -i '' "s/DB_PASSWORD='database_password'/DB_PASSWORD='${DB_PASSWORD}'/" .env
sed -i '' "s/# DB_HOST='localhost'/DB_HOST='${DB_HOST}'/" .env
sed -i '' "s/WP_ENV='development'/WP_ENV='${WP_ENV}'/" .env
sed -i '' "s|WP_HOME='http://example.com'|WP_HOME='${WP_HOME}'|" .env
sed -i '' "s|WP_SITEURL='\${WP_HOME}/wp'|WP_SITEURL='${WP_SITEURL}'|" .env

# Add custom repositories and require plugins
composer config repositories.satispress composer https://packagist.yard.nl/satispress
composer config repositories.owc-gravityforms-digid vcs git@github.com:yardinternet/owc-gravityforms-digid.git
composer config repositories.gravityforms-csp-fixer vcs git@github.com:yardinternet/plugin-gravityforms-csp-fixer.git
composer config repositories.prefill-gravity-forms vcs git@github.com:OpenWebconcept/plugin-prefill-gravity-forms.git
composer config repositories.owc-gravityforms-zaaksysteem vcs git@github.com:OpenWebconcept/plugin-owc-gravityforms-zaaksysteem.git
composer config repositories.owc-openpdd-sanitizer vcs git@github.com:OpenWebconcept/plugin-owc-openpdd-sanitizer.git
composer config repositories.idp-userdata vcs git@github.com:OpenWebconcept/idp-userdata.git
composer config repositories.wp-packagist composer https://wpackagist.org

# Require the plugins
composer require plugin/owc-gravityforms-zaaksysteem plugin/owc-openpdd-sanitizer plugin/prefill-gravity-forms ypackagist/gravityforms wpackagist-plugin/cmb2

# Navigate back to the project root
cd ..

echo "Bedrock and plugins have been installed successfully."