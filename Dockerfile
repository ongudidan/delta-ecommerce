# FROM vaultke/php8-fpm-nginx

# # Copy application files
# COPY . /var/www/html

# # Set the working directory
# WORKDIR /var/www/html

# # Install zip extension using apk (Alpine package manager)
# RUN apk --no-cache add libzip-dev zip \
#     && docker-php-ext-install zip

# # Set permissions
# RUN chmod -R 777 /var/www/html


FROM vaultke/php8-fpm-nginx

# Copy application files
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install required packages and extensions using apk (Alpine package manager)
RUN apk --no-cache add libzip-dev zip \
    && apk --no-cache add libpng-dev libjpeg-dev libfreetype-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip gd

# Set permissions
RUN chmod -R 777 /var/www/html