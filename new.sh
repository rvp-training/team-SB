#!/usr/bin/env bash

set -e
set -u

curl http://localhost/api/posts/new \
    -X POST \
    -H 'Content-Type:multipart/form-data' \
    -F 'image[]=@./images/5eec0fd4c9591.png' \
    -F 'image[]=dev/null;filename=' \
    -F 'image[]=dev/null;filename=' \
    -F 'image[]=dev/null;filename=' \
    -F 'image[]=dev/null;filename=' \
    -F 'upload=Upload' \
    -F 'title=Title' \
    -F 'user_id=1' \
    -F 'category_id=1'