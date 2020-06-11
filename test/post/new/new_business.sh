#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=business' \
    -F 'text=business_content' \
    -F 'tag=business_tag' \
    -F 'category_id=1'

docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM images'
docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM posts'