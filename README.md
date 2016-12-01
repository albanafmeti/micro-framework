Usage of frameworks like _Laravel, Symfony_ etc. makes us ( _who love **PHP**_ ) start thinking and asking ourselves: _Could we implement our own framework?_ In this article we are going to start creating our simple framework and understanding how can we built a framework with _MVC_ design pattern using _PHP_. 

![Micro Framework](wallpaper.jpg)

##Introduction

Firstly we are going to discuss the main components and features that our framework will have. It's going to have this features:

*    _Bootstraping_ is the first step where will be processed the HTTP request, or we can say it's the engine of all framework in which is made all processing stuff like _routing, dispatching_ etc.
*    _Routing_, serves to point every request to e specific action of any controller
*   _Middlewares_ will be like a filter. Before executing an action, a middleware can be executed to make validations e.g. to check if user is logged in or not.
*   _Modules_, that is a widget based feature, which helps us separating different parts of a website in classes with a specific function, that will be executed in a specific part of a layout e.g. a widget showing the weather.
- For _Database_ functions we are going to use a powerful _ORM_ currently in the web, used by _Laravel_ framework, **Elloquent**
- Regarding to _Views_ we are going to use a powerful  templating engine used by _Laravel_ too, **Blade**.
- _Multi Language_
- Other features are going to be discovered while implementing the framework...

The directory structure of our project is going to be like this:

``` php
/
+-- app
    +-- controllers
    +-- exceptions
    +-- libs
    +-- models
    +-- modules
+-- bootstrap
+-- cache
+-- config
+-- public
+-- resources
    +-- langs
    +-- views
+-- vendor
```

* Inside the "_controllers_" directory are going to stay the controllers classes that will extend a parent class called "**Controller**" that is located under _/app/libs_.
* Inside the "_libs_" directory are going to be different classes used to make the framework functional. 
* The "_exceptions_" directory is going to contain different exceptions classes we have customized extending the "**Exception**" class.
* Inside the "_models_" directory will be the models classes of the framework that are going to extend an "**Elloquent**" class.
* "_modules_" directory will contain some classes serving for creation of different widgets in the UI while creating e.g. an website.
* "bootstrap" directory will contain 2 specific files called 
    1. _autoload.php_ serves to make the auto loading of some specific classes we are going to talk below
    2. _FrontController.php_ serves like an engine of the framework
* We don't have to do with "_cache_" directory because it's necessary only for _Blade_ templating engine.
* In the "_public_" directory is going to live the _index.php_ file together with _.htaccess_, an _Apache_ config file.
In _public_ directory will stay all the public stuff like e.g. _js_, _css_ and _images_.
* In the "_langs_" directory are going to be the "_.ini_" files which are _key => value_ lines necessary for the multi language feature of the framework. 
* In the "_views_" directory are going to stay all html view files and layouts. 
* The last folder "_vendor_" doesn't have to do with us, because it is necessary for downloaded packages and libraries via _composer_.

_Continues_...
