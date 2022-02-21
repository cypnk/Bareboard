# Bareboard
Simple Discussions

This is an experimental work in progress. Most things are either broken or not implemented yet.


## Nginx example config
```
server {
	server_name example.com;
	
	# Change this to your web root, if it's different
	root /usr/share/nginx/example.com/html;
	
	# Prevent access to special files
	location ~\.(hta|htp|md|conf|db|sql|json|sh)\$ {
		deny all;
	}
	
	# Prevent direct access to cache folder
	location /cache {
		deny all;
	}
	
	# Send all requests (that aren't static files) to index.php
	location / {
		try_files $uri @bareboard;
		index index.php;
	}
	
	location @bareboard {
                rewrite ^(.*)$ /index.php;
        }
	
	# Handle php
	location ~ \.php$ {
		fastcgi_pass	unix:/run/php-fpm/php-fpm.sock;
		fastcgi_index	index.php;
		include		fastcgi.conf;
        }
}
``` 

### OpenBSD's httpd(8) example config
```
# A site called "example.com" 
server "www.example.com" {
	alias "example.com"
  
	# listening on external addresses
	listen on egress port 80
	
	# Uncomment the following, if you're only hosting on Tor
	#listen on lo port 80
	
	# Default directory
	directory index "index.html"
  
	# Change this to your web root, if it's different
	root "/htdocs"
  
	# Prevent access to special files
	location "/*.hta*"		{ block }
	location "/*.htp*"              { block }
	location "/*.md*"		{ block }
	location "/*.conf*"		{ block }
	location "/*.db*"		{ block }
	location "/*.sql*"		{ block }
	location "/*.json*"		{ block }
	location "/*.sh*"		{ block }
	
	# Prevent direct access to cache folder
	location "/cache/*"		{ block }
	
	# Let index.php handle all other requests
	location "/*" {
		directory index "index.php"
		
		# Change this to your web root, if it's different
		root { "/htdocs/index.php" }
		
		# Enable FastCGI handling of PHP
		fastcgi socket "/run/php-fpm.sock"
	}
}
``` 
