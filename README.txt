This product includes software developed by the OpenSSL Project
for use in the OpenSSL Toolkit: (http://www.openssl.org/)
 
========
This project contains all the source code for the Gunn Robotics Team Website.
Some methods and implementation details are outlined below:
========

=================
==   GENERAL   ==
=================

Files are organized within directories by programming language or content-form (images or HTML/PHP modules, such as navBar or footer).

With the exception of programming language folders, no directory or file is named starting with capital letters. Furthermore, images follow the convention of "<source>_<detail>".

The site uses GET requests to access .xml files in the "XML" directory. These .xml files contain all relevant information about the page that is being accessed including images, titles, and paragraphs.

==============
==   HTML   ==
==============

Standard STRICT conventions are used. Classes identify elements that can appear many times on a page and Ids identify elements that will only appear once.

Furthermore, certain, stand-alone HTML is stored in the HTML directory for regeneration via PHP. Examples of this HTML include the footer and header.

HTML is also present within XML as CDATA.

=============
==   CSS   ==
=============

All colors will be specified in the rgba() or rgb() formats.  The performance drop is considered negligible, yet convenience to new developers is high.

Due to the xml-based format of the site, one stylesheet controls the majority of the site. For cases where a unique style is needed, it is defined either inline or in the head tag of the relevant page(s); ideally, unique styling will be in the head tag to reduce code clutter. This is for load time performance increases and reduced server-side clutter.

A major exception to the above rule is in the homepage; due to highly specialized CSS, a seperate stylesheet is to be provided.

Efforts have been made to ensure no element has two sources of the same attribute.

=============
==   PHP   ==
=============

All webpages are built in the PHP 5.5 enviroment.

PHP is used to recreate the HTML required for "modules" such as the footer and header.

Additionally, the included XML engine is responsible for the the parsing of XML in response to GET requests for content distribution into usable HTML. This engine utilizes Object Oriented Programming instances (similar to Java) to allow flexibility in design via the permission of multiple XML parsings per page. An added benefit of this approach is the ease in training new Webmasters due to the prevalence of the Java programming language.

Lastly, PHP is used in the contact form to send an email directly to the GRT Webmasters.
