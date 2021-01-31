# packetloss.com.br

![CD](https://github.com/sistematico/packetloss.com.br/workflows/Deploy%20VueJS%20App/badge.svg?event=push)

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

## Nginx config

```
user nginx;
worker_processes auto;
pid /run/nginx.pid;

events {
	worker_connections 768;
}

http {
	sendfile on;
	tcp_nopush on;
	tcp_nodelay on;
	keepalive_timeout 65;
	types_hash_max_size 2048;

	include /etc/nginx/mime.types;
	default_type application/octet-stream;

	ssl_protocols TLSv1 TLSv1.1 TLSv1.2 TLSv1.3; # Dropping SSLv3, ref: POODLE
	ssl_prefer_server_ciphers on;

	access_log /var/log/nginx/access.log;
	error_log /var/log/nginx/error.log;

	gzip on;

    server {
        listen 80;
        listen [::]:80;
        server_name www.packetloss.com.br packetloss.com.br;
        return 301 https://packetloss.com.br$request_uri;
    }

    server {
        listen 443 ssl;
        listen [::]:443 ssl;
        
        ssl_certificate         /etc/letsencrypt/live/packetloss.com.br/fullchain.pem;
        ssl_certificate_key     /etc/letsencrypt/live/packetloss.com.br/privkey.pem;

        root /var/www/packetloss.com.br/dist;
        index index.php index.html index.htm index.nginx-debian.html;
        server_name packetloss.com.br www.packetloss.com.br;

        location /api/v1/ {
            try_files $uri $uri/ /api/v1.php?$args;
        }

        location / {
            try_files $uri $uri/ /index.html;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        }

        location ~ /\.ht { deny all; }
    }
}
```

