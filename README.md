# fitmewise




Video de funcionamiento:

[Watch the video on YouTube](https://youtu.be/JEQHeElXehc)






# FRONTEND
Acceder a la carpeta FRONTEND

yarn install

yarn dev

http://localhost:5173/

# BACKEND


Acceder a la carpeta BACKEND

composer update

composer install

(Set .env file)

php artisan migrate --seed

php artisan serve

http://127.0.0.1:8000

### Variable necesaria en el .env

WEATHER_APP_ID=f49653e026f6bd0c4262ce24fd7466ae


### CONNECTION TO REMOTE DATABASE (AWS RDS)

DB_CONNECTION=mysql

DB_HOST=database-1.c9a28weiie9f.us-east-1.rds.amazonaws.com

DB_PORT=3306

DB_DATABASE=fitmewise

DB_USERNAME=admin

DB_PASSWORD=fitmewise






