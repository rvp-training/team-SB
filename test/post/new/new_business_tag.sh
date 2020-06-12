#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=business1' \
    -F 'text=business_content1' \
    -F 'tag=business_tag1' \
    -F 'category_id=1'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=business2' \
    -F 'text=business_content2' \
    -F 'tag=business_tag1' \
    -F 'category_id=1'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=business3' \
    -F 'text=business_content3' \
    -F 'tag=business_tag2' \
    -F 'category_id=1'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=business4' \
    -F 'text=business_content4' \
    -F 'tag=business_tag3' \
    -F 'category_id=1'


docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM images'
docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM posts'