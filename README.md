<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# NewBlog
My first Test Project to get accustomed to Laravel. It is a Blog with Registration, Posts and Comments. Build with Laravel/ui, has standard Bootstrap scaffolding.

---

## How to run the App
1. clone or Download Repository
2. open Terminal and cd into Project Folder
3. run the following Commands in the Terminal:
   >composer install 

   >npm install
4. create a Database
5. run:
   >php artisan key:generate
6. create .evn file from .env.example
7. change DB connection in your .env file
8. run:
   >php artisan storage:link
   
   >php artisan migrate:fresh --seed
   
9. go to **app/Providers/AppServiceProvider.php** and uncomment **View::share('newestPosts', Post::latest()->take(5)->get());**

*You can use the following Account to Login*

**Email:** Admin@admin.com

**Password:** password


---
## How to Post
1. Click on "Register"
2. Fill in the Form
3. Verify your Email
4. Click on "Dashboard"
5. Click on "My Posts"
6. Click on "New Post"
7. Fill in all the Fields
8. Click "Create Post"
---
## User Stories
- User can create Account
  - Email verification
- User can Post
  - User can Update Posts
  - User can Delete Posts
- User can Comment
  - User can Vote on Comments
  - User can Comment a Comment (one Layer)
---
## Features
- Posts have Categories
- Posts have a Header Image
- The newest Posts are shown in the Sidebar

## Pictures
### Table Design
![Tables](Screenshot%20(13).png)

### App
![Tables](Screenshot%20(11).png)
![Tables](Screenshot%20(12).png)
