
# Clone the Repository

# Install Dependencies

composer install

npm install

# Set Up Environment File

cp .env.example .env

# Generate Application Key


php artisan key:generate

# Run Database Migrations & Seed Data
php artisan migrate

php artisan db:seed

