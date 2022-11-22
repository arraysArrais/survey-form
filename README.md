
# SurveyForm

A simple, customizable and responsive form solution using HTML, CSS, jQuery, PHP and MySQL.


## Requirements
I recommend using XAMPP for the ease of use, buy you could also install needed components separately
- Apache 2.4.54+
- MySQL/MariaDB 10.4.25+
- PHP 8.1.10+
- Any modern web browser (Tested using Firefox 107.0)

## Features
- Fully customizable
- Responsive
- Strong server-side validation for input fields
- MySQL database integration


## Installation

- Create a database to store the sent data and run the 'sqlschema/survey.sql' SQL Script to create all database structure needed
- Change the connection string located in /config/connection.php to use **your host and database parameters**
- Make sure that your Apache, PHP and MySQL servers are up and running (and that the project folder is located inside your php server folder)

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


![](https://i.imgur.com/AqXj9mR.jpeg)


![](https://i.imgur.com/Kg6o313.jpeg)


![](https://i.imgur.com/ha7UU0O.jpeg)

![App Screenshot](https://i.imgur.com/Do5Ez3R.jpeg)

![App Screenshot](https://i.imgur.com/QQfPMpN.jpeg) 

![](https://i.imgur.com/fDeUaVF.gif)



## Roadmap

- [x]  Back-end platform integration -> DONE with **PHP + MySQL**
- [x]  Strong client-side dynamic JS validation
- [x]  Server-side validations
- [ ]  CSV data export
- [ ]  Analytics charts




