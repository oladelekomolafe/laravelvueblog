# Vue Laravel CRSF
This Package will allow you to include the Laravel's csrf token to the forms inside the Vue app.

## Installation

You can install this package via composer using this command:

`npm install vue-laravel-csrf`

## Usage

First confirm that you have `meta` tag of the csrf in your blade file or in the head of the page.
EX: `<meta name="csrf-token" content="ubRt4jwLGAuv1MKmVynMyqosbcayoyMC4Gd88Epo">`.

Then, just add the directive to the form tag and you're ready to go,
`<form v-csrf-token>`.