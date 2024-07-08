# Dockerfile.php

# Use an official PHP runtime as a parent image
FROM php:latest

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the web application files into the container
COPY . /var/www/html

# Copy flag.txt into the root of the disk /
#COPY flag.txt /flag.txt

# Create a directory for PHP session files
RUN mkdir -p /var/lib/php/sessions

# Delete flag from /var/www/html/ directory
#RUN rm /var/www/html/flag.txt

# Copy custom php.ini file to configure session save path
COPY php.ini /usr/local/etc/php/php.ini

# Expose port 80 to allow incoming HTTP traffic
EXPOSE 80

# Define the command to run your PHP application
CMD ["php", "-S", "0.0.0.0:80"]
