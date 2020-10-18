## Snippets from my secret folder

Do you happen to have a secret folder hidden in the depths of your filesystem comprising of a bunch of text files
elucidating your dreams, aspirations, fears and motivation? 

**Snippets from my secret folder** is a small PHP application that allow you to render the text file contents of your folder into a neat little blog format, like so:

![Blog screen](/assets/blog.png)

No database, no hassle! A simple way to render all your text files in a super visually appealing way!

#### Real talk
I basically made this project to practice and get a better understanding of file manipulation in PHP, thaz all! :sweat_smile:

#### Features
* Lists all the folders in the PHP script directory and creates a blog view of the folder selected. This allow for mutiple blogs, one folder for each!

![Main screen](/assets/home.png)

* The application sorts your text files in accordance to the time of creation and displays the latest one first.

* Each blog post show icons indicating what time of day (AM/PM) the corresponding file was created and also generates tags based on a predefined filename format (e.g filename - "food vietnamese_bakery cafe good_food.txt").

![Main screen](/assets/blogpost.png)

* DARK MODE :sunglasses:

![Dark mode](https://media.giphy.com/media/doWcYeCJ3jUz2mwJmx/giphy.gif)

#### Ongoing

* Code needs more refactoring and tidying up.
* File upload feature.
* Better error handling.
* Dark mode colour fixes.


