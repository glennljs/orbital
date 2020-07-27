# Orbital Project - Frinner 
http://orbital-project.herokuapp.com/

## Introduction

### Proposed Level of Achievement: 
Gemini

### Target Audience: 
NUS Hall/ Residential Colleges

### Motivation: 
Hall caterers will prepare food for the total number of people staying in a given hall or RC. One may not consume their meals and this would lead to a wastage of food. Hence to solve this problem we have decided to create a **web app** that allow users to seamlessly attain matriculation numbers of those students that are not eating. This not only solves the problem of food wastage but also allows a hungry student to get a second serving or he could invite his friends that don’t stay in the hall to come have a meal with him.

### Aim
We hope to make sharing of frinners a pleasant experience and as such encourage the sharing of frinners to prevent food wastage.

### User Stories
1. As a student, I would like to be able to give and take frinners easily.
2. As a student, I would like to be able to give and take frinners to/from anyone in my hall/RC, not just my circle of friends.
3. As a student, I would like to have a log of how often I have given and taken frinners.

## Functionalities Implemented:

### Scope
The Webapp provides a simple user-friendly interface for users to give and take frinners as well as view previous entries with ease.

### Webapp

#### Technologies
1. Laravel Framework for Backend
2. Laravel Blade Templating for Frontend
3. Bootstrap for Styling

#### Functions
1. Login/Registration Authentication System with Password Hashing
2. User Dashboard with their paginated personal Frinner history
3. Give/Take Frinner functionality
4. System checking to prevent duplicate frinner given as well as controlling number of frinners taken
5. Priority Queue system that allows pre-requesting of frinners that are fulfilled when frinners are provided by other users
6. Profile & Profile edit
7. Delete of untaken frinners or remove from queue whilst frinner has not been given

## Software Engineering Principles

### Model System
![Model System](https://github.com/glennljs/orbital/blob/master/images/models.png)

#### Models
1. User model holds important information about the user such as name, username, hashed password and matriculation card number.
2. Frinner model holds information about the specific given frinner (giver, taker)
3. FrinnerQueue model holds information about the users in the queue.

#### Relationships
1. User model has 2 one-to-many relationships with Frinner model
	* One relationship for given frinners
	* One relationship for taken frinners

2. User model has 1 one-to-many relationship with FrinnerQueue model.

## Issues Encountered

### Implementation
1. Difficulty in creating a queue system for the frinners (solved)
	*	Solution: Create a separate FrinnerQueue model table that specifically stores the users who are currently queuing.

2. Difficulty in decoupling the backend and frontend
	* Current System too reliant on transmitting specific data directly from backend to frontend before display
	* Proposed Solution: Try to abstract functions (such as getters and setters) out into small unit level soApp that it would be easier to be implemented into a http request based API.

3. Difficulty in setting up the telegram bot
	* Requires an API as well as token based authentication that we were unable to implement.

4. Ethical issues of providing matriculation numbers to other users.
	* Worry that users can just "keep" the numbers and used.
	* Workarounds: System is based on a social trust contract system. However, since the system is able to log each taking of frinners, it will be easier to track who has access to a hogged matriculation card number.

## User Testing

Testing was done via peer review as well as our friends.

### Issues

1. Unable to delete frinners before it is taken by someone. (Fixed)
2. Unable to edit my matriculation card number if I initially input the wrong number while signing up. (Fixed)
3. Unable to remove myself from the queue if I had decided not to take the frinner. (Fixed)
4. No way to notify if I have successfully received a frinner while being in the queue.
	* Unfortunately we were unable to implement a notification system for the app.
