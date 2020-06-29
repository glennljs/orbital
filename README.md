# Orbital Project - Frinner 

## Introduction

### Proposed Level of Achievement: 
Gemini

### Target Audience: 
 NUS Hall/ Residential Colleges

### Motivation: 
Hall caterers will prepare food for the total number of people staying in a given hall or RC. One may not consume their meals and this would lead to a wastage of food. Hence to solve this problem we have decided to create a **telegram bot** and a **web app** that allow users to seamlessly attain matriculation numbers of those students that are not eating. This not only solves the problem of food wastage but also allows a hungry student to get a second serving or he could invite his friends that don’t stay in the hall to come have a meal with him.

## Functionalities Implemented:

### Webapp

#### Technologies
1. Laravel Framework for Backend
2. Laravel Blade Templating for Frontend
3. Bootstrap for Styling

#### Functions
1. Login/Registration Authentication System with Password Hashing
2. User Dashboard with their paginated personal Frinner history
3. Give/Take Frinner functionality
4. System checking to prevent duplicate frinner given as well as controlling number of frinners taken.
5. Priority Queue system that allows pre-requesting of frinners that are fulfilled when frinners are provided by other users.
6. Profile 

## Issues Encountered

### Implementation
1. Difficulty in creating a queue system for the frinners (solved)
	*	Solution: Create a separate FrinnerQueue model table that specifically stores the users who are currently queuing.

2. Difficulty in decoupling the backend and frontend
	* Current System too reliant on transmitting specific data directly from backend to frontend before display
	* Proposed Solution: Try to abstract functions (such as getters and setters) out into small unit level so that it would be easier to be implemented into a http request based API.

## To do
### Webapp
1. Profile editing (Change username/password/matric card number etc.)
2. Remove frinner from queue if not taken
3. Admin rights

### Api
1. Transit Backend to become fully independent API system.

### Telegram Bot
1. Utilize backend to provided similar functionality using Telegram Bot.

## Work Plan
#### 4th Week of June: First prototype launched - Testing and debugging phase
1st week of July: Evaluate and implement peer teams’ suggestions.  

2nd week of July: Implementing additional features from todo list.

3rd week of July: Testing and debugging.

4th week of July: Final touches.
