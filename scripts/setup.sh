#!/usr/bin/env bash
set -e # exit if something goes wrong

# Define the Bedrock directory
BEDROCK_DIR="bedrock"

# Remove the Bedrock directory if it already exists
if [ -d "$BEDROCK_DIR" ]; then
  echo "Removing existing Bedrock directory..."
  rm -rf "$BEDROCK_DIR"
fi

# Create the Bedrock directory
mkdir $BEDROCK_DIR

# Define the environment variables
DB_NAME="wordpress"
DB_USER="wordpress"
DB_PASSWORD="wordpress"
DB_HOST="database"
WP_ENV="development"
WP_HOME="http://openpdd-new.lndo.site"
WP_SITEURL="${WP_HOME}/wp"

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
composer config repositories.owc-mijn-services vcs git@github.com:OpenWebconcept/plugin-owc-mijn-services.git
composer config repositories.owc-gravityforms-zgw vcs git@github.com:OpenWebconcept/plugin-owc-gravityforms-zgw.git
composer config repositories.owc-openpdd-sanitizer vcs git@github.com:OpenWebconcept/plugin-owc-openpdd-sanitizer.git
composer config repositories.idp-userdata vcs git@github.com:OpenWebconcept/idp-userdata.git
composer config repositories.wp-packagist composer https://wpackagist.org

# Require the plugins
composer require plugin/owc-mijn-services plugin/owc-gravityforms-zgw plugin/owc-openpdd-sanitizer plugin/prefill-gravity-forms ypackagist/gravityforms wpackagist-plugin/cmb2

# Create theme (e.g. for Acorn support and pretty error reporting)
cd web/app/themes && composer create-project roots/sage owc dev-main --ignore-platform-reqs && npm i && npm run build

# Navigate back to the project root
cd ../../../../

echo "Bedrock and plugins have been installed successfully."

# Start Lando
lando start

# Install WordPress via wp-cli
lando wp core install --url="https://openpdd-new.lndo.site" --title="OpenPDD" --admin_user="admin" --admin_password="password" --admin_email="admin@example.com" --path=bedrock/web/wp

# Activate all plugins
lando wp plugin activate --all --path=bedrock/web/wp

# Activate the theme
lando wp theme activate owc --path=bedrock/web/wp

echo "Environment has been configured."