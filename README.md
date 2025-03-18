# Bellingham Buzz

thebellinghambuzz.com

Discover the best bars, restaurants, and events buzzing in Bellingham.
---
## Table of Contents

- [About](#about)
- [Creation](#creation)
- [Contents of this Repo](#contents-of-this-repo)
- [Credit](#credit)

---

## About

Do you find yourself asking these questions?
- I am so hungry, but where should I go?
- I want to hangout with my friends but I want to switch it up tonight. How can I find a place that fits all of our needs?
- I am wanting to try something new tonight for my birthday dinner, but where to go?
- My parents are in town for the weekend, where should I take them?

Your solution is... the *Bellingham Buzz*!

We want to help Western Students find something new to do in Bellingham. Expand what they already know and show them new places to eat or hangout. 

Our website aims to make finding a place convenient, not dreadful. It involves three different ways to find a place to go in Bellingham 
1. A Quiz
2. I’m feeling Lucky button
3. Browse page

---

## Creation

### Design
We wanted our style to feel familiar to Bellingham locals while emphasizing the setting of night life. So, we decided to design our theme around the iconic Herald sign. The dark theme with the popping red (orange?) color makes the site feel minimalist and feel familiar. 
### Features
- We wanted the main focal point of the site to be our very own quiz to narrow down your options. So, we added the button to the top nav bar for easy access.
- The "I'm Feelin' Lucky" button was a popular feature suggested in our first round of feedback. Inspired by Google's button of the same name, this button will give you a place to go instantly. This is for user's who have no requirements or don't have the patience to take a 7 question quiz.
- After feedback from prototype usability tests, we found that users also wanted to browse through the whole directory of places in town. So, we made the Browse page! Accessible from the navbar, you can look through our whole database of locations. You can also sort through this large list by a multitude of filter options and even search by name in the search bar!
- As the locations are handpicked and recommended by our team, we wanted to give a brief overview of who we are. The "Who We Are" page gives a description of all three of us, so you can know about who is recommending your night out. On this page, we also have a guide on how to use the site.

### Tools
For the creation of this site, we used Wordpress and MySQL to manage our database. We also made our custom plugins and templates with PHP. Initial designs and mockups were made with Figma.
---
## Contents of this Repo

### Data Table (restaurants.sql)
The restaurants table contains information about various restaurants, bars, and other establishments in Bellingham. Each row represents a different establishment with details such as name, type, description, address, and various attributes like price range, accessibility, and operating hours. The table includes columns for specific features like happy hour times, whether dogs are allowed, and if the place is adults-only. The table uses an id column as the primary key, which is set to auto-increment to ensure unique identifiers for each entry.

### OG Google Sheets Data Set
[NightoutDataset.csv](NightoutDataset.csv) was the initial data set we made in preparation for our project.
### Plugins 
In the custom plugins folder you will find the 3 custom plugins made for the functionality of our site: auto, quiz, and feelin_lucky.

#### Auto Populate Custom Posts
This plugin ([auto.php](auto.php)) makes a magic button within the Wordpress dashboard that auto creates custom posts for every location entry.
This was made so that we didn't get carpal tunnel making every location it's own post.
It registers a custom post type 'locations2' and associated taxonomies, and provides an admin menu option to trigger the population of these posts. When activated, it fetches location data, checks for existing posts to avoid duplicates, and creates new posts with relevant metadata such as opening hours and categories. The plugin ensures that the custom post type and taxonomies are properly registered and flushed on activation.

#### Quiz
This plugin makes the big feature of the website, the quiz that recommends location based on preferences.
It enqueues necessary styles and scripts, retrieves restaurant data from a custom database table, and localizes this data for use in the frontend. The plugin defines a shortcode [bb_quiz] that renders a quiz form with various questions about the user's dining preferences, such as whether they prefer indoor or outdoor seating, budget constraints, and more. Users interact with the quiz by selecting options, and upon submission, the plugin processes the responses to display the most suitable restaurant recommendations.

#### Feelin Lucky
This is a clone of the quiz plugin but minus the quiz part. 
The getRandomRestaurant function selects a random restaurant and calls displayRestaurant to update the HTML with the restaurant's details, including its name, image, type, price, approval status, and vibe. The slugify function generates URL-friendly slugs for restaurant names, and formatPrice formats the price information into a visual representation. The plugin also dynamically styles the restaurant's approval tag based on who approved it

### Location Page Template
single-locations2.php
This template was made to fill out all the location's information from the database. It displays the location's title, image, and various metadata such as type, approval status, price range, age restriction, vibe, and activity level. It fetches restaurant details and displays information like accessibility, dog-friendliness, happy hour availability, and outdoor seating. It also provides links to the restaurant's website and Google Maps directions, and shows the restaurant's opening hours for each day of the week. Finally, it includes the footer template part.

### Style
[style.css](style.css) is the style sheet made by the theme Sharkwave but with our additional styling for our plugins and other features. 
---
## Credit

Sophia Zhuk

Maya Galley

Kiley Schutte
---
A project for CSCI 348 @ WWU.