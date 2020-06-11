#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=private1' \
    -F 'text=private_content1' \
    -F 'tag=private_tag1' \
    -F 'category_id=2'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=private2' \
    -F 'text=private_content2' \
    -F 'tag=private_tag1' \
    -F 'category_id=2'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=private3' \
    -F 'text=private_content3' \
    -F 'tag=private_tag2' \
    -F 'category_id=2'

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf2e2896e29.jpeg' \
    -F 'upload=Upload' \
    -F 'title=private4' \
    -F 'text=private_content4' \
    -F 'tag=private_tag3' \
    -F 'category_id=2'


docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM images'
docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM posts'