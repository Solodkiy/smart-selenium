Smart selenium
==============

Regular selenium docker container with one extra feature: http api for downloaded files on localhost:8080

Unfortunately there is no way to reach downloaded files in pure selenium by API. It could be a problem if you want run selenium in docker container and avoid mounting unnecessary directories.

This docker container consists from selenium/standalone-chrome:3.6.0-copper and simple php script to provide control downloaded files API.

There are 4 commands:
```
http://localhost:8080/cmd.php?cmd=version - return script version
http://localhost:8080/cmd.php?cmd=get_names - return names of all downloaded files
http://localhost:8080/cmd.php?cmd=get_by_name&name=file_name - return download file content (in base64 encoding)
http://localhost:8080/cmd.php?cmd=clear - remove all files from download dir
```

Docker image: https://hub.docker.com/r/solodkiy/smart-selenium  
Php client: https://github.com/Solodkiy/smart-selenium-driver
