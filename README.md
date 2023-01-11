# WelgelegenBB-WebDev1-Eindopdracht

Most of the text on the homepage is written by an AI: https://app.inferkit.com/demo and then translated to dutch with another AI: https://www.deepl.com/translator
All the images were generated using yet antoher AI: https://openai.com/dall-e-2/

To get to the login page navigate to /admin
Login with:
username: admin
password: q99VkniykDsa


TODO:
[X] - reCaptchav2 implementeren
[X] - dont use SELECT *
[X] - change admin password
[] - dont save, but update, if someone is already in database
[] - remove unnacicary CSS
[] - reservationcontroller.php bookRoom() some of the code via service layer
[] - create sql load script
[] - /api/roomcontroller.php line 44. Make that function work
[] - check with rubrics
[] - walk through all the code and refactor
[] - code review with the boys
[] - error handeling

------------------------------------------------------------------------------

Rubrics:

CSS:
[] - 0 points: The application has not been styled using a CSS framework.
[] - 1 point: The application has been styled using a CSS framework, but there are minor faults in the look and feel.
[x] - 2 points: The application has been styled using a CSS framework, has a consistent and pleasing aesthetic, and adapts well to different viewport sizes.

Sessions:
[] - 0 points: The application does not make use of sessions.
[x] - 1 point: The application makes use of sessions for storing and reading simple data, such as login information.

Security:
[] - 0 points: The application is not well protected against malicious JavaScript and SQL code injection, and passwords are stored as plain text.
[] - 1 point: The application is well protected against malicious JavaScript and SQL code injection, and implements parameterized queries and input sanitization, and stores passwords in hashed form.

MVC:
[] - 0 points: The MVC pattern is not or only partially implemented.
[x] - 1 point: The MVC pattern has been implemented, with a clear division of responsibilities between controllers, models, and views, and all CRUD operations are present in the application.
[] - 2 points: The MVC pattern has been implemented, with a clear division of responsibilities between controllers, models, and views, and all CRUD operations are present in the application. Routing and view templating are present and implemented well, and services and repositories or similar classes are used consistently for data access. The code is generally well structured and makes good use of basic object orientation concepts.

API:
[] - 0 points: There is no API functionality implemented.
[x] - 1 point: The application provides one or more API endpoints that allow access to data in JSON format.

JavaScript:
[] - 0 points: There is no JavaScript functionality implemented.
[x] - 1 point: The application makes use of JavaScript to update parts of pages without refreshing by reading and processing JSON data.
[] - 2 points: The application makes use of JavaScript to communicate with the API endpoint to update parts of pages without refreshing, by reading and processing JSON data, and to send data to the server without refreshing.
