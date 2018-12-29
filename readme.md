Smart selenium
==============

Regular selenium docker container with one extra feature: http api for downloaded files

Unfortunately there is no way to reach downloaded files in pure selenium by its API. It could be a problem if you want run it in docker container and avoid mounting unnecessary directories.

This docker container consists from selenium/standalone-chrome:3.6.0-copper and simple PHP API script.

This script provides 4 commands which can be reached by seleniumDriver::get()
```
http://localhost:8080/cmd.php?cmd=version - return script version
http://localhost:8080/cmd.php?cmd=get_names - return names of all downloaded files
http://localhost:8080/cmd.php?cmd=get_by_name&name=file_name - return download file content (in base64 encoding)
http://localhost:8080/cmd.php?cmd=clear - remove all files from download dir
```

Docker image: https://hub.docker.com/r/solodkiy/smart-selenium  
Client on PHP : https://github.com/Solodkiy/smart-selenium-driver
