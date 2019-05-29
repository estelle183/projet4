#### How to use

This code need to be deployed on an apache server, after installation it can display a blog with the following features :

- Publication of chapters with a visual editor 
- Creating, reading, updating and deleting chapters
- Publication by visitors of comments on chapters
- Comment Reporting System 
- Moderation of comments on the basis of reports
- Pages with fixed content : Home, Author, Contact, Legal notice

#### Required

- Apache server 
- PHP 7.2 or more 
- Mysql

#### Installation

The project integrates composing with an autoloader in PSR-4 and PHPMailer.

- Composer 
- PHPMailer
- TinyMCE


###### 1. Clone Github repositiory and Composer install


git clone https://github.com/estelle183/projet4

`composer install`



###### 2. Create a database for this project and inject this for create tables

-- Table for Chapters

    CREATE TABLE IF NOT EXISTS `chapters` (

    `id` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `subtitle` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `creation_date` datetime NOT NULL,
    `update_date` datetime DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table for Comments

    CREATE TABLE IF NOT EXISTS `comments` (

    `id` int(11) NOT NULL,
    `chapter_id` int(11) NOT NULL,
    `author` varchar(255) NOT NULL,
    `comment` text NOT NULL,
    `comment_date` datetime NOT NULL,
    `reported` tinyint(4) NOT NULL DEFAULT '0',
    `moderate` tinyint(4) NOT NULL DEFAULT '0'  
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table for Administration

    CREATE TABLE IF NOT EXISTS `Administration` (

    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `login` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `token` varchar(255) DEFAULT NULL,
    `token_date` datetime DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table for Contact

    CREATE TABLE IF NOT EXISTS `contact` (

    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `message` text NOT NULL,
    `date_send` datetime NOT NULL,
    `consent` tinyint(1) NOT NULL DEFAULT '0',
    `processed` tinyint(1) NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

###### 3.Duplicate file DbManagerSample.php to DbManager.php in Model and add your dbname, login and password.


###### 4.Done, now if installation success, you can add new chapters, and start to work. Thanks you for your participation.