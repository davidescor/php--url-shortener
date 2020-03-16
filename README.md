![url-shortener](http://davidespier.com/img/appweb/shorturl.png)

# URL-SHORTENER
Save your images in the cloud.  Project made with javascript and firebase.

## Requirements

- Php 5.6+.
- Mysql.

(You can use usbwebserver or xampp)


## Installation

1. Upload file (/database) in your database.

2. Update (/php) files model, register and login, access data from the database.

3. Add your domain in this line of code.

               
   Line 111 (/anonymous.php).

        <a id='num' href='your-domain/index.php?url=".$shorturl."'>your-domain/index.php?url=".$shorturl."</a>";

   Line 45 (/model.php)
   
        <a id='num' href='your-domain/index.php?url=".$shorturl."'>your-domain/index.php?url=".$shorturl."</a>";
        
4. Run

```bash
At this time it is not available.
```

## Website project

http://davidespier.com/pages/shorturl/main.php


## Authors



 *Developed and designed by*  **David Espier**


[Personal website](https://davidespier.com)

[Alexa skills](https://www.amazon.es/s?k=davidespier&i=alexa-skills)
        
[Other projects](https://github.com/davidespier?tab=repositories)



## License


[MIT License](https://choosealicense.com/licenses/mit/) © davidespier.com
