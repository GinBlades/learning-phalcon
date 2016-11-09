Working through the [Learning Phalcon PHP](https://www.packtpub.com/web-development/learning-phalcon-php) book from Packt.

## Nginx Config:

    server {
        listen 80;
        server_name learning-phalcon.dev;

        index index.php;
        set $root_path "/var/www/learning-phalcon/public";
        root $root_path;

        client_max_body_size 10M;

        try_files $uri $uri/ @rewrite;

        location @rewrite {
            rewrite ^/(.*)$ /index.php?_url=/$1;
        }

        location ~\.php {
            fastcgi_index /index.php;
            fastcgi_pass unix:/run/php/php7.0-fpm.sock;
            fastcgi_intercept_errors on;
            include fastcgi_params;

            fastcgi_split_path_info ^(.+\.php)(/.*)$;

            fastcgi_param PATH_INFO $fastcgi_path_info;
            # fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param DOCUMENT_ROOT $realpath_root;
            fastcgi_param SCRIPT_FILENAME $realpath_root/index.php;
        }

        location ~* ^/(css|img|js|flv|swf|download)/(.+)$ {
            root $root_path;
        }

        location ~ /\.ht {
            deny all;
        }
    }
