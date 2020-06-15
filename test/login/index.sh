#!/usr/bin/env bash

set -e
set -u

curl http://localhost/login/index \
    -X POST \
    -F 'mail=test@gmail.com' \
    -F 'pass=testtesttest' 
    
curl http://localhost/login/index \
    -X POST \
    -F 'mail=testjanai@gmail.com' \
    -F 'pass=testtest' 


curl http://localhost/login/index \
    -X POST \
    -F 'mail=testjanai@gmail.com' \
    -F 'pass=testtesttest' 
    
curl http://localhost/login/index \
    -X POST \
    -F 'mail=test@gmail.com' \
    -F 'pass=testtest' 
    

curl http://localhost/login/index \
    -X POST \
    -F 'mail=admin@gmail.com' \
    -F 'pass=testtesttest' 
    