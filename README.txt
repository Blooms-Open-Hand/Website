HOME CARE CLIENT WEBSITE
=========================

Files:
- index.php             Home / landing page
- about.php             About Us
- services.php          Services
- gallery.php           Dynamic gallery
- blog.php              Dynamic blog listing
- blog_detail.php       Individual blog article
- tours.php             Upcoming tours
- contact.php           Contact page + contact form
- header.php             Shared header/navigation
- footer.php             Shared footer
- site.php               Shared database/content helpers
- config.php             Database settings

DATABASE:
Use the same database as the admin dashboard:
DB_HOST = localhost
DB_NAME = home_care_db
DB_USER = root
DB_PASS = ''

IMPORTANT:
1. Put these files in the same public web directory as the admin files, or configure
   the paths if you place them in another folder.
2. The frontend reads banners, blogs, gallery, tours and website settings directly
   from the database created by the admin dashboard.
3. Uploaded images from the admin dashboard work automatically when their saved
   path is relative to the website root.
4. Replace the static About/Services text and default images with the client's
   approved content before launch.
5. The contact form uses PHP mail(). Your hosting server must have mail configured.
   If mail() is unavailable, use SMTP/PHPMailer later.
6. Tailwind is loaded from the CDN for simple deployment. For production, you can
   compile Tailwind locally for better performance.

Included client-side requirements:
- Responsive Home page
- Dynamic hero/banner
- Organization introduction
- Services
- Why-us content
- Gallery
- Latest blog posts
- Upcoming tours
- Contact CTA
- About Us
- Services
- Gallery lightbox
- Blog + individual article pages
- Contact form
- Phone/email/address/maps/social links
- Working hours
- SEO title/description basics
