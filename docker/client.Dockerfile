# Use Node.js for development and build steps
FROM node:18 AS build

WORKDIR /app

# Install dependencies
COPY ../client/package*.json ./
RUN npm install

# Copy app source code
COPY ../client .

# Copy argument from docker-compose
ARG VITE_API_BASE_URL
RUN echo "VITE_API_BASE_URL=${VITE_API_BASE_URL}" > ./.env

# Build the app for production
RUN npm run build

# Use Nginx for production
FROM nginx:alpine AS production

# Copy build files to Nginx directory
COPY --from=build /app/dist /usr/share/nginx/html

# Expose port 80
EXPOSE 80

# Default command
CMD ["nginx", "-g", "daemon off;"]
