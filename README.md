# Software Engineering Project

Bootstrap webpage with FlightPHP framework & MVC pattern with SQL database for Pizza store&delivery:
- register/login form,
- input form for an order, 
- input filed for subscription,
- input form for message functionality,
- CRUD operations for admin panel (add/edit/delete)


# FlightPHP

This framework is an extensible micro-framework for PHP. The official webpage: http://flightphp.com/. Other technologies that are used are HTML, CSS, PHP, SQL, JS.

# Architectural pattern

We have decided to use MVC architectural pattern for our web application primarily because of the possibility to build multiple views for models. It was more convenient for this type of application to use it since any modifications don't influence the whole model. We are constantly modifying and improving some of the UI as well as creating more views, so this pattern made it possible to be able to change layouts without touching the logic of the application. It also goes for possibility of changing the models without touching the UI, so again it decreases the bug "scope", we could immediately know where the bug happened.

# Design pattern

Template Method Pattern is used within Controllers for more organized and cleaner code structure. It helped avoid duplicate code and separate code into private methods, which are then simpler to use and test. The usage of abstract classes enables removing common and unnecessary parts of the problem. This project also has implemented Front Controller 
Design Pattern within the FlightPHP framework. Using this pattern means that all requests that come from a resource in application will be handled by a single handler, then forwarded to the appropriate handler for that type of request. 



