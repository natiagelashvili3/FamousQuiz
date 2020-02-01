# FamousQuiz Documentation

### Project description
In this project system will ask user to choose quiz type: Binary(yes/no) or Multiple choice quiz. Then user has to chose correct answer from the list

### Prerequisites
-	PHP version 7
-	MySQL

### Configuration
In config/Config class you will find main configuration file, it contains Database configuration and host configuration parameters which is required.  	
In database folder you will find the backup of the database than can be imported in your table.  
```csharp
<VirtualHost *:80>  
    DocumentRoot "C:/xampp/htdocs/quiz/public"  
    ServerName quiz.app  
</VirtualHost>
```


### Login in admin panel
With /admin you will appear in admin login page, to log in please enter  
username: `manager`  
password: `123456`  
Firstly you need to add question and choose its type(binary or multiple), then you can modify this questions answers, click "Modify Answers" button to choose and modify its answers.

#### admin login page
![alt tag](/rsc/login.PNG)

### project review
##### Home page
![alt tag](/rsc/home.PNG)

#### Quizz Page
After choosing mode you will be appear in quiz start page, and as soon as you click start button questions will show up
![alt tag](/rsc/start.PNG)

#### Questions
![alt tag](/rsc/quiz.PNG)

