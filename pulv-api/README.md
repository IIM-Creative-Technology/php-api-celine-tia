<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



# A propos

Comment l'installer ?  
Mettre les commandes suivantes  : 
```bash 
 composer install
```
Ensuite  :
 ```bash 
php artisan migrate
```
```bash 
php db:seed
```
```bash 
php artisan serve
```

# ROUTES
1) S'authentifier   
Requête HTTP : POST | http://localhost:8000/api/auth/login  
Aller dans les paramètres Body et mettre :  
email = un mail utilisateur existant   
password = password 

2) Récupérer l'access_token   
Mettre l'access_token récupéré dans Authorization avec Type = Bearer Token 

## CLASSES 

```
BODY : [name, school_year]  
GET | http://localhost:8000/api/classes  
GET | http://localhost:8000/api/class/{className}  
POST | http://localhost:8000/api/classes   
PUT | http://localhost:8000/api/classes/{classesId}  
```
## ETUDIANTS 

```
BODY : [first_name, last_name, age, first_year, id_school_year]  
GET | http://localhost:8000/api/students  
GET | http://localhost:8000/api/students/{studentId}   
GET | http://localhost:8000/api/students/marks/{studentId}   
POST | http://localhost:8000/api/students     
PUT | http://localhost:8000/api/students/{studentId}  
DELETE | http://localhost:8000/api/students/{studentId}
```

## INTERVENANTS
   
```
BODY : [first_name, last_name, first_year]  
GET | http://localhost:8000/api/teacher   
GET | http://localhost:8000/api/teacher/{teacherId}  
POST | http://localhost:8000/api/teacher  
PUT | http://localhost:8000/api/teacher/{teacherId} 
```

## MATIERES
```
BODY : [name, date_begin, date_end, id_teacher, id_school_year] 
GET | http://localhost:8000/api/subjects  
GET | http://localhost:8000/api/subjects/{subjectId}  
POST | http://localhost:8000/api/subjects   
PUT | http://localhost:8000/api/subjects/{subjectId}
```

## NOTES
```
BODY : [id_student, id_subject, score] 
POST | http://localhost:8000/api/marks  
```
