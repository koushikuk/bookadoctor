Generate Token
------------------
URL: http://telosid-dev.inadev.net/services/session/token

SET Hedare for authentication
-------------------------------
Name: X-CSRF-Token
Value: eH-dBjkovygI7nQNHI37zBgMbGW1KixztZ2M4E1DAns

Name: Content-Type
Value: application/json

Drupal Register API
-----------------

URL : http://telosid-dev.inadev.net/tsauser/user/register

Request : {"mail" : "test@gmail.com","pass" :{ "pass1" : "123456", "pass2" : "123456" }}

Responce:{"uid":"7","uri":"http://telosid-dev.inadev.net/tsauser/user/7"}


------ Drupal Logout API ------- 

http://telosid-dev.inadev.net/tsauser/user/logout


Request : {"mail" : "test@gmail.com"}

Responce : true

------ Request New Password ------

http://telosid-dev.inadev.net/tsauser/user/request_new_password

{"mail" : "test@gmail.com"}

------ Login API ------

http://telosid-dev.inadev.net/tsauser/user/login

Request : {"username": "test@gmail.com", "password": "123456"}

Responce : true

http://telosid-dev.inadev.net/tsauser/edit_profile.json

Request : {"user_id": "9","mail_id": "test@oit.com","pass": "123"}

Responce(true) : 	{"Status":"Success","Message":"Profile updated successfully."}
Responce(false):   {"Status":"Error","Message":"Invalid credentials. Please provide valid ID."}