# Booh-Botnet

 Booh! is a simple Http Botnet built by "Droid" which is a pseudonym of Filipe Borges with the aim of doing research in the area of digital security.
 More info can be Read on www.landingpage.com

 # How To Instal
 * [Panel(Laravel)](#Panel)
 * [Polymorphic_Builder](#Polymorphic_Builder)
 * [Live Preview](#Preview)



# Preview


# Panel
  This panel was created on Laravel framework, There is already a lot of documentation on how to install on the internet, google it!

  Any problem Send me Msg.


# Polymorphic Builder

  To use this builder you will need
  * `**Visual studio 2017** `

  * `**Python3** `


  **First** create a user for the panel, for simplicity I created a route to do it

   "www.Your-Panel-Ip.com/createUser/{username}/{password}"

 ![alt text](https://raw.githubusercontent.com/FilipeBorges1993/Booh-Botnet/master/Screen%20Shot%202018-04-10%20at%2016.05.41.png)


  This route can be disabled manually

  * `Admin / routes / web.php`

  Comment the line


  ```php
  Route :: get ('/ createUser / {username} / {password}', 'Auth_Controller @ createUser')
  ```
 **Second** save the PanelKey and CrypthKey then you need to base64 encode your panel Ip/domain like that 
   
   * ` http://You-Panel-ip/Api ` 
   
   You can use "https://www.base64encode.org/" for it.
   
   Than save your **Base64 encoded URl** to.
   
   I added a feature that allows you to use a backup Url that uses the website www.pastebin.com. This feature premies that in    case of any problem with the primary url, the owner of the botnet panel can use the paste to update the url panel.
   
   To use this you need to create an new paste on pastebin.com, base64 encode the raw version of it like the main url and save    it with the other information.
   
   
   
   
   
  **Third** Go to polymorphic builder folder with terminal and use the command :
   
  ```python
     python3 main.py
  ```
    
   Than add the the previous saved information to the respective fields.
   
   ![alt text](https://github.com/FilipeBorges1993/Booh-Botnet/raw/master/Screen%20Shot%202018-04-10%20at%2017.35.46.png)
   
   
   
   **Four** Now we need to compile. To do it we just need to use Visual Studio 2017 and the client is ready.
   
   
     
     
   
   
   
   
   
   
   
   
   
   
 
 




