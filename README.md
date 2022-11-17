# Laravel Project Template

- Frontend: Vue.js 3, Tailwind
- Session and cache storage: redis
- Backend: Nginx, Laravel

## Configure HTTPS

Copy/create the crt and key files named **server.crt** and **server.key** respectively in **docker/nginx/ssl** directory.

## Start and Stop application

- Start services: ```docker-compose up```
- Stop services: ```docker-compose down -v```
