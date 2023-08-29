# Listing-F1-Race-Results__Beginner
A beginner level PHP application that lists the race result of the race in which the Year and Race information is entered using the API F1 data shared free of charge by ergast.com, and lists the pit stop information and ranking of the race whose year race and pit stop information are entered.
# Information
This application is a beginner PHP application. The main purpose is to learn how to use the API, then to learn how to pull and print data. First of all, it is useful to read the documentation on the http://ergast.com/mrd/ site to get information about the API and to examine the https://tr.wikipedia.org/wiki/Formula_1 page to understand the F1 logic. Then you can implement the application by making connections and doing a lot of research.
# File Path
```
F1
├── controller
│   ├── guess.php
│   ├── pilot_details.php
|   ├── pitTime.php 
│   └── round.php
├── img
│   └── f1.png (You Can Get From Files)
├── model
│   ├── guess.php
│   ├── pilot_details.php
|   ├── pitTime.php 
│   └── round.php
├── style
│   └── style.css
├── view
│   ├── partials
│   │   ├── footer.php
│   │   └── header.php
│   ├── guess.php
│   ├── pilot_details.php
|   ├── pitTime.php 
│   └── round.php
└── htaccess
```
# 1. Page Round
On the 1st page, that is, round.php, there are Year and Race entry fields. According to the entered information, the data is tabulated dynamically with the For loop.
# 2. Page Pit Time
On page 2, we display the Pit Stop times and ranking as a table by entering the year and race information again.
# 3 Guess the Page
After entering the year and round on page 3, we try to predict the top 5 of the actual race based on the sobra qualifying laps.
# 4th Page Pilot Details
After entering the year and the name of the pilot, we print the detailed information about the season we want and the total score of the pilot we want.
# controller
First, we direct it to the controller file and set our variables null on this page. Then, after pressing the button, we check the information entered in the input with isset and check the null value. If an invalid value is entered, it will give an error message because it will return a null value. At the same time, we make our API connection with the model file.
# model
In our model file, we take our API, i.e. .json link, and put the $yearInput and $roundInput $pilotInput variables in the year and round section and send the information in the input as a link.
# view
We have an html body section in our view file, and we connect our header.php and footer.php pages with include in the beginning and end. After checking the isset with the button by typing the input sections in the body part, we start our for loop and increase the table rows as much as our for loop.
# Application Information
I developed this application during my internship at Train Payment Inc. (PAYGURU) from August 1st, 2023, to August 28th, 2023.
# License
This project is licensed under the MIT License. See the LICENSE.md file for details.
# İmages
![Ekran görüntüsü 2023-08-29 153650](https://github.com/omerkilic-0/Listing-F1-Race-Results__Beginner/assets/123635257/54325b47-f858-4e0f-91db-c3d4b1eaa935)
![Ekran görüntüsü 2023-08-29 153606](https://github.com/omerkilic-0/Listing-F1-Race-Results__Beginner/assets/123635257/f6936bdc-7f9e-4199-ab34-ecb9100626b2)
![Ekran görüntüsü 2023-08-29 153631](https://github.com/omerkilic-0/Listing-F1-Race-Results__Beginner/assets/123635257/f6b2fa45-434b-46f1-baec-5f43981da171)
