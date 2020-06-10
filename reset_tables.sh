#!/usr/bin/env bash
docker container exec team-sb_db_1 psql -U postgres -c 'DROP TABLE comments'
docker container exec team-sb_db_1 psql -U postgres -c 'DROP TABLE images'
docker container exec team-sb_db_1 psql -U postgres -c 'DROP TABLE posts'
docker container exec team-sb_db_1 psql -U postgres -c 'DROP TABLE categories'
docker container exec team-sb_db_1 psql -U postgres -c 'DROP TABLE users'

curl -s http://localhost/db/create_tables/users.php
curl -s http://localhost/db/create_tables/categories.php
curl -s http://localhost/db/create_tables/category_default.php
curl -s http://localhost/db/create_tables/posts.php
curl -s http://localhost/db/create_tables/images.php
curl -s http://localhost/db/create_tables/comments.php


