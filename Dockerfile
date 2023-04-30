# Start with the official Laravel image
FROM bitnami/laravel:latest

WORKDIR .

COPY . .

# Expose the port the app runs in
EXPOSE 8000
