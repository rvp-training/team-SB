#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5edf4b97db18d.jpeg' \
    -F 'image[]=@./images/5edf4b97db18d.jpeg' \
    -F 'upload=Upload' \
    -F 'title=Title' \
    -F 'text=Text' \
    -F 'tag=Tag' \
    -F 'category_id=1'

docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM images ORDER BY id DESC LIMIT 1'
docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM posts ORDER BY id DESC LIMIT 1'
