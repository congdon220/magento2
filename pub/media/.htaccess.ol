# For security reasons, Option all cannot be overridden.
#Options All -Indexes
Options ExecCGI Includes IncludesNOEXEC SymLinksIfOwnerMatch -Indexes

<IfModule mod_php5.c>
php_flag engine 0
</IfModule>

<IfModule mod_php7.c>
php_flag engine 0
</IfModule>

AddHandler cgi-script .php .pl .py .jsp .asp .htm .shtml .sh .cgi
Options -ExecCGI

<IfModule mod_rewrite.c>

############################################
## enable rewrites

# For security reasons, Option followsymlinks cannot be overridden.
#    Options +FollowSymLinks
    Options +SymLinksIfOwnerMatch
    RewriteEngine on

############################################
## never rewrite for existing files
    RewriteCond %{REQUEST_FILENAME} !-f

############################################
## rewrite everything else to index.php

    RewriteRule .* ../get.php [L]
</IfModule>

############################################
## setting MIME types

# JavaScript
AddType application/javascript js jsonp
AddType application/json json

# CSS
AddType text/css css

# Images and icons
AddType image/x-icon ico
AddType image/gif gif
AddType image/png png
AddType image/jpeg jpg
AddType image/jpeg jpeg

# SVG
AddType image/svg+xml svg

# Fonts
AddType application/vnd.ms-fontobject eot
AddType application/x-font-ttf ttf
AddType application/x-font-otf otf
AddType application/x-font-woff woff
AddType application/font-woff2 woff2

# Flash
AddType application/x-shockwave-flash swf

# Archives and exports
AddType application/zip gzip
AddType application/x-gzip gz gzip
AddType application/x-bzip2 bz2
AddType text/csv csv
AddType application/xml xml

<IfModule mod_headers.c>

    <FilesMatch .*\.(ico|jpg|jpeg|png|gif|svg|js|css|swf|eot|ttf|otf|woff|woff2)$>
        Header append Cache-Control public
    </FilesMatch>

    <FilesMatch .*\.(zip|gz|gzip|bz2|csv|xml)$>
        Header append Cache-Control no-store
    </FilesMatch>

</IfModule>

<IfModule mod_expires.c>

############################################
## Add default Expires header
## http://developer.yahoo.com/performance/rules.html#expires

    ExpiresActive On

    # Data
    <FilesMatch \.(zip|gz|gzip|bz2|csv|xml)$>
        ExpiresDefault "access plus 0 seconds"
    </FilesMatch>
    ExpiresByType text/xml "access plus 0 seconds"
    ExpiresByType text/csv "access plus 0 seconds"
    ExpiresByType application/json "access plus 0 seconds"
    ExpiresByType application/zip "access plus 0 seconds"
    ExpiresByType application/x-gzip "access plus 0 seconds"
    ExpiresByType application/x-bzip2 "access plus 0 seconds"

    # CSS, JavaScript
    <FilesMatch \.(css|js)$>
        ExpiresDefault "access plus 1 year"
    </FilesMatch>
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"

    # Favicon, images, flash
    <FilesMatch \.(ico|gif|png|jpg|jpeg|swf|svg)$>
        ExpiresDefault "access plus 1 year"
    </FilesMatch>
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"

    # Fonts
    <FilesMatch \.(eot|ttf|otf|svg|woff|woff2)$>
        ExpiresDefault "access plus 1 year"
    </FilesMatch>
    ExpiresByType application/vnd.ms-fontobject "access plus 1 year"
    ExpiresByType application/x-font-ttf "access plus 1 year"
    ExpiresByType application/x-font-otf "access plus 1 year"
    ExpiresByType application/x-font-woff "access plus 1 year"
    ExpiresByType application/font-woff2 "access plus 1 year"

</IfModule>
