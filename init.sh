#!/usr/bin/env bash

curl -s http://localhost/db/create_tables/users.php
curl -s http://localhost/db/create_tables/categories.php
curl -s http://localhost/db/create_tables/category_default.php
curl -s http://localhost/db/create_tables/posts.php
curl -s http://localhost/db/create_tables/images.php
curl -s http://localhost/db/create_tables/comments.php
