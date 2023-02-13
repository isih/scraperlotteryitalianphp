# scraperlotteryitalianphp

=> By Hassnain Ali

=> What it's FOR? This Program is developed to fetch Lottery data from a website, clean that data and post that data/content on our Wordpress Post with the help of "cron-job" everyday. So it's automating the whole process so we don't need to do it everyday manually.

=> How it WORKS? This repository consists of two PHP files, first one is "firstPost.php" which is basically responsible to display the content related to the Lottery Data. In this file first we are using the "cURL" to fetch/grab the data from the targetted website using it's URL. Then afterwards that data is being stored in separate arrays according to their type for instance the title, date, and values. Then these arrays are being used to further divide and display the required content for each day of the week. Majorly to make everything simple I've divided the code into 7 "if" statements which means one for each day. Keep in mind it only runs one statement each day but there can be child "if" statements to our main "if" statements because on some days we need to create two posts separately. Moreover it is important to know that I've used "wp_insert_post()" function to insert the post to the wordpress.

The second file we have is "show.php" this file contain almost all the code from the "firstPost.php" file except for the part of code which is responsible for the publishing of the post insted I've used "wp_update_post()" to post the remaining data/content of the Lottery that was remaining which are the "Tables" in our case.

=> Why we divided the code in two FILES? Well the answer is simple because of the SEO we post the "firstPost.php" file first to optimize the post and then after a few hours we post the "show.php" file which updates the previously created post by "firstPost.php".

=> Important to KNOW! For each day of the week Lottery data is announced/displayed on the website at 21:00 pm (Spanish/Italian Time).

Thank You!
