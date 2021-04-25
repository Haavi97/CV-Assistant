# CV assitant
> Project for the course ICD0007 Web technologies

## Description of the project
This program will be a kind of CV assistant. A unified platform in which a person can add any information about himself that he believes will help him when applying for a job. And during the application process, a person does not need to create a new CV and send it to the HR manager. He or she can simply send their own link, which will contain a large amount of information about the person. That is, the platform automatically searches or requests the necessary information and, if possible, fills it in itself. There will be such moments as feedback from the employer, colleagues, (you can also add people who taught you). It will also be possible to add all the courses that the person took and the projects in which they participated. Social networks also have a role to play there, because the employer can see what his potential employee is doing in his free time.

## Enos server

[Link to the web site](https://enos.itcollege.ee/~issoys/cv-assistant/index.php)

## Members
|Name|Tasks|Email|
|---|---|---|
|Javier Ortín|Seems like finally... all tasks|<fortin@taltech.ee>|

## Different pages
### About [(```index.php```)](https://enos.itcollege.ee/~issoys/cv-assistant/index.php)
General page that would explain the webpage.
Used scripts:
- [```main.php```](main.php)
- [```functions.js```](functions.js)

### FAQ [(```faq.php```)](https://enos.itcollege.ee/~issoys/cv-assistant/faq.php)
As it name says a Frequent Answered Questions page.
Used scripts:
- [```main.php```](main.php)
- [```functions.js```](functions.js)

### Login [(```login.php```)](https://enos.itcollege.ee/~issoys/cv-assistant/login.php)
Login page that handles the users login and redirects to the main page with a different navigation menu. Logout is handled with script [```logout.php```](logout.php)
Used scripts:
- [```main.php```](main.php)
- [```handlelogin.php```](handlelogin.php)

### Create account [(```create.php```)](https://enos.itcollege.ee/~fortin/cv-assistant/create.php)
Page for creating an account. It validates the input username and password and then tries to add it to the DB. If the username already exists it will give an error and in the site is promted a message.
Used scripts:
- [```main.php```](main.php)
- [```adduser.php```](adduser.php)
- [```functions.js```](functions.js)

### Edit CV [(```edit.php```)](https://enos.itcollege.ee/~issoys/cv-assistant/edit.php)
A page to edit the active user CV. The form is handle in the script [```main.php```](```main.php```). The addition buttons will be handled later with JS.
Used scripts:
- [```main.php```](main.php)
- [```onlylogged.php```](onlylogged.php)
- [```editform.php```](editform.php)
- [```functions.js```](functions.js)

### Feedback [(```feedback.php```)](feedback.php)
A page where the user can give feedback to work collegues as well as request feedback from collegues for him/herself.
Used scripts:
- [```main.php```](main.php)
- [```onlylogged.php```](onlylogged.php)
- [```recommend.php```](recommend.php)
- [```functions.js```](functions.js)