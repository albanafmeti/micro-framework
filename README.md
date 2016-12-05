Usage of frameworks like [_Laravel_](https://laravel.com/), [_Symfony_](https://symfony.com/) etc. makes us ( _who love **PHP**_ ) start thinking and asking ourselves: _Could we implement our own framework?_ In this article we are going to create our simple framework and understanding how can we build a framework with _MVC_ design pattern using _PHP_. 

![Micro Framework](wallpaper.jpg)

##Introduction

####Why would you like to create your own framework?


If you look around, everybody will tell you that it's a bad thing to reinvent the wheel and that you'd better choose an existing framework and forget about creating your own. But anyhow there are a few good reasons to start creating your own framework:

1. To create a framework tailored to your very specific needs
2. To experiment creating a framework for fun
3. To prove the world that you can actually create a framework on your own
4. To get a good experience in PHP


####MVC architecture

The **Model-View-Controller** (MVC) is an architectural pattern that separates an application into three main logical components: the model, the view, and the controller. Each of these components are built to handle specific development aspects of an application. The **Model** component corresponds to all the data related logic that the user works with. The **View** component is used for all the UI logic of the application.  **Controllers** act as an interface between Model and View components to process all the business logic and incoming requests, manipulate data using the Model component and interact with the Views to render the final output. For more on MVC design pattern read this article at SitePoint: [The MVC design pattern and PHP](https://www.sitepoint.com/the-mvc-pattern-and-php-1/). We are going to use MVC design pattern to build our framework.


####Our Project

Instead of creating everything in our framework from scratch, we are going to use some external packages. To install these we are going to use Composer, a project dependency manager used by modern PHP applications. If you don't have it yet, [download and install Composer now](https://getcomposer.org/).

To continuously we are going to discuss the main components and features that our framework will have.

1.   _Bootstraping_. “bootstrap PHP code” means creating a bootstrapper that handles all the dynamic requests coming to a server and apply the true MVC (Model View Controller) framework so that in future you can change the functionality for each unique controller or application without changing the entire code or application.

2.    _Routing_.
To understand what a router does, you must first understand what a rewrite engine is.
A rewrite engine is software that modifies a web URL's appearance (URL rewriting). Rewritten URLs (sometimes known as short, fancy URLs, or search engine friendly - SEF) are used to provide shorter and more relevant-looking links to web pages. The technique adds a degree of separation between the files used to generate a web page and the URL that is presented to the World.
If you want rewritten URLs, you need some kind of routing, as routing is the process of taking the URL, braking it into components and deciding what is the actual script to call. 
**Routing** is the process of taking a URI endpoint (that part of the URI which comes after the base URL) and decomposing it into parameters to determine which module, controller, and action of that controller should receive the request.

3.  _Filters_. Before executing an action of the controller, some filters can be applied to a route, which are functions to be executed before the action. In this filters we can make different validation and checks e.g. if the user is not logged in redirect to login page.

4.  _Modules_. It's a widget based feature, which helps us separating different parts of an application in classes with a special function, that will be executed in a specific part of a layout e.g. a widget showing the weather.
5. For _Database_ functions we are going to use a powerful _ORM_ currently in the web, used by _Laravel_ framework, [**Eloquent**](https://laravel.com/docs/5.3/eloquent)
6. Regarding to _Views_ we are going to use a powerful  templating engine used by _Laravel_ too, [**Blade**](https://laravel.com/docs/5.3/blade).

The directory structure of our project is going to be like this:

```
/
+-- app
    +-- controllers
    +-- exceptions
    +-- libs
    +-- models
    +-- modules
+-- bootstrap
+-- config
+-- public
+-- resources
    +-- langs
    +-- views
+-- storage
    +-- cache
    +-- logs
+-- vendor
```

* Inside the _controllers_ directory are going to stay the controllers classes that will extend a parent class called **`Controller`** located under _/app/libs_.
* Inside the _libs_ directory are going to be different classes used to make the framework functional. 
* The _exceptions_ directory is going to contain different exceptions classes extending the **`Exception`** class.
* Inside the _models_ directory will be the models classes of the framework that are going to extend an **`Eloquent`** class.
* _modules_ directory will contain some classes serving for creation of different widgets in the UI while creating for example an website.
* _bootstrap_ directory will contain a file called _FrontController.php_ which serves like an engine and is going to make all the bootstraping part of the framework
* We don't have to do with _cache_ directory because it's necessary only for _Blade_ templating engine.
* _logs_ directory it's going to contain log files for different application errors when it is in production mode
* The _public_ directory is accessible to all, and here is going to live the _index.php_ file together with _.htaccess_, an Apache config file. In the _public_ directory will stay all the public stuff like js, css and images etc.

* In the _langs_ directory are going to be some _`.ini`_ files which are _`key = value`_ pairs necessary for the languages of the framework. 
* In the _views_ directory are going to stay all blade view files and layouts
* _cache_ is the directory where will be compiled files from Blade templating engine which we are going to talk later for. The _logs_ folder may contain different log files.
* The last directory _vendor_ doesn't have to do with us, because it's necessary for downloaded packages and libraries via [_Composer_](https://getcomposer.org/).

Continues...
