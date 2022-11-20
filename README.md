
# SurveyForm

A simple, customizable and responsive form solution using HTML, CSS, jQuery, PHP and MySQL.


## Requirements
I recommend using XAMPP for the ease of use, buy you could also install needed components separately
- Apache
- MySQL
- PHP 8.1+
- Any modern web browser (Tested using Firefox 107.0)


## Installation

Create a database to store the sent data and run the 'sqlschema/survey.sql' SQL Script to create all database structure needed
Change the connection string located in /config/connection.php to use your host and database parameters

```bash
  git clone https://github.com/arraysArrais/survey-form.git
  cd survey-form/
  index.php 
```
## Usage

You can change the background image to one of the image assets included by changing the value of the 'background-image' of the .body CSS class 

```bash
  background: url(assets/images/image1.jpg)
  background: url(assets/images/image2.jpg)
```


## Screenshots

![App Screenshot](https://i.imgur.com/WjUQ9Fb.jpeg) 

![App Screenshot](https://i.imgur.com/Do5Ez3R.jpeg) ![App Screenshot](https://i.imgur.com/QQfPMpN.jpeg) 



## Roadmap

- Back-end platform integration -> DONE with PHP + MySQL Database
- CSV data export
- Strong client-side dynamic JS validation


