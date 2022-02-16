# Dream Theater CMS
> Life's biggest battles often are fought alone  
> \- Breaking All Illusions, Dream Theater

## Starting guide

The project is made with the support of Laravel framework, and uses Laravel Sail (thanks to the support of Docker Engine) for creating a compact system based on two containers, one for the applicative and another for the database.

### Prerequisites
Make sure that:
- Docker is already installed on your computer
- Ports **80** and **3306** are not used by any other services - if they are, you can change it with other ports in the .env file
- Composer is already installed on your computer

### Necessary step
- Copy the .env.example file into .env file and change any parameter with values that you need
  - N.B.: Before executing the following command, make sure that you must be in the root of the project  
**`cp .env.example .env`**

### Start docker containers
Open a terminal in the root of the project and type:  
**`docker-compose up -d`**

### Install necessary third-part dependecies
Open a terminal in the root of the project and type:  
**`composer i`**
**`npm i && npm run dev`**


---

# Last but not least, click [here](http://127.0.0.1) and visit the Dream Theater CMS
###### If the website doesn't work, maybe you have changed the app port in the env file, so change the url appending the port at the end of the url.

---

### Original request
> Sviluppo di un sito web in Laravel per consentire ad una band musicale di pubblicare notizie, video, musica, album, etc etc. 
> 
> In particolare, il sito avrà un lato backend per l'editing dei contenuti con accesso riservato agli amministratori del sito e un frontend per gli utenti (i fan della band) che vedranno i contenuti caricati.
> 
> Per delimitare meglio l'ampiezza del progetto, i contenuti da caricare devono essere:  
> - dati e info sulla band
> - video della band
> - canzoni della band
> - info su concerti passati e futuri
> - immagini della band
> - contatti