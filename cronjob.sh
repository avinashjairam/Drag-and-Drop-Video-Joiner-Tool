*/1 * * * * find /var/www/steelpanwebsite.com/public_html/video_joiner/ -mmin +30 -user www-data -exec rm -rdf {} \; >> /var/www/steelpanwebsite.com/public_html/video_joiner/output.log 2>&1

