# Frontend - Database Integrated

This package keeps the existing frontend HTML/CSS/JS design and changes the pages to PHP so they can read the same MySQL database used by the admin panel.

## Files integrated

- `index.php` - latest published banner is used for the existing hero.
- `gallery.php` - published gallery records are loaded dynamically.
- `blog.php` - published blog records are loaded dynamically.
- `blog-post.php` - dynamic blog article page using the same frontend styling.
- `contact.php` - contact details/map are loaded from Website Content; upcoming tour schedules are loaded from Tour Schedule.
- `about.php` / `services.php` - existing design/content retained, with shared organization/contact details made dynamic.
- `site.php` - shared database/settings/helpers.

## Deployment

Place the contents of this folder in the same project root as the `admin` folder, for example:

project-root/
  admin/
  index.php
  about.php
  services.php
  gallery.php
  blog.php
  blog-post.php
  contact.php
  site.php
  styles.css
  blog.css
  script.js
  ...

The frontend automatically looks for `admin/config.php` in the same project root. It also supports being placed in a subfolder next to `admin`.

Use the existing `admin/config.php` and database. Do not create a second database configuration.

## Admin -> Frontend mapping

- Banner Management -> homepage hero
- Gallery Management -> gallery page
- Blog Management -> blog page + dynamic article pages
- Tour Schedule -> available schedule choices on the contact/tour form
- Website Content -> organization name, phone, email, address, map URL and working hours

The visual classes, CSS files, animations, navigation structure and existing design are retained. No frontend framework was introduced.
