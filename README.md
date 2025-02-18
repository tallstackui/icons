# TallStackUI

<p align="center"><a href="https://tallstackui.com" target="_blank"><img src="https://raw.githubusercontent.com/tallstackui/website/main/arts/tallstackui.svg" width="500"></a></p>

<p align="center">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/tallstackui/tallstackui?style=for-the-badge">
    <a href="https://laravel.com"><img alt="Laravel v10.x" src="https://img.shields.io/badge/Laravel-^v10.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="PHP 8.1" src="https://img.shields.io/badge/PHP-^8.1-777BB4?style=for-the-badge&logo=php"></a>
    <a href="https://livewire.laravel.com"><img alt="Livewire v3.x" src="https://img.shields.io/badge/Livewire-^v3.x-FB70A9?style=for-the-badge"></a>
</p>

> Since TallStackUI version 2.0 changed the way custom icons are used, this repository has become read-only, just to maintain support for those still using TallStackUI version 1.0.

## Icon Repository

This repository aims to store all icons used in TallStackUI. 

### Instructions

This is the instructions to add new icons:

1. Create a folder with the name of the vendor/types of the icon

2. Run this command to generate the icons:

```bash
php script.php folder_name_goes_here
```

---

- All `.svg` files will be transformed in `.blade.php` files
- All files will receive the `{{ $attributes }}` inside the `svg` tag
- All `.svg` files will be deleted before the process

## Documentation

[Visit our website to see the documentation](https://tallstackui.com/docs)
