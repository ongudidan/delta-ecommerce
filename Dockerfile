FROM vaultke/php8.3-fpm-nginx

# Copy application files
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install required packages and extensions using apk (Alpine package manager)
# RUN apk --no-cache add libzip-dev zip \
#     # && apk --no-cache add libpng-dev libjpeg-dev libfreetype-dev \
#     # && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install zip gd\
#     && apk --no-cache add nano  # Add nano


# Set permissions
RUN chmod -R 777 /var/www/html
RUN chmod -R 777 /var/www/html/assets
RUN chmod -R 777 /var/www/html/web

# Set PHP upload limits
# RUN echo "upload_max_filesize=200M\npost_max_size=200M\nmemory_limit=256M" > /usr/local/etc/php/conf.d/uploads.ini
