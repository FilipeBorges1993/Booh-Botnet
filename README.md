# Booh-Botnet

 Booh! is a simple Http Botnet built by "Droid" which is a pseudonym of Filipe Borges with the aim of doing research in the area of digital security.
 More info can be Read on www.landingpage.com

 # How To Instal
 * [Panel(Laravel)](#Panel)
 * [Polymorphic_Builder](#Polymorphic_Builder)
 * [Live Preview](#Preview)






# Panel
  This panel was created on Laravel framework, There is already a lot of documentation on how to install on the internet, google it!

  Any problem Send me Msg.


# Polymorphic Builder

  To use this builder you will need
  * `**Visual studio 2017** `

  * `**Python3** `


  First create a user for the panel using, for simplicity I created a route to do it

   "www.Your-Panel-Ip.com/createUser/{username}/{password}"

 ![alt text](https://raw.githubusercontent.com/FilipeBorges1993/Booh-Botnet/master/Screen%20Shot%202018-04-10%20at%2016.05.41.png)


  This route can be disabled manually

  * `Admin / routes / web.php`

  And comment the line


  ```php
  Route :: get ('/ createUser / {username} / {password}', 'Auth_Controller @ createUser')

```


# Preview
