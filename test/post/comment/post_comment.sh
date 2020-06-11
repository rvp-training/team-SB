#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/detail/comments \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'post_id=1' \
    -F 'user_id=1' \
    -F 'content=Content' \

curl http://localhost/api/posts/detail/comments \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'user_id=1' \
    -F 'content=Content' \

curl http://localhost/api/posts/detail/comments \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'post_id=1' \
    -F 'content=Content' \

curl http://localhost/api/posts/detail/comments \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'post_id=1' \
    -F 'user_id=1' \

docker container exec team-sb_db_1 psql -U postgres -c 'SELECT * FROM comments'