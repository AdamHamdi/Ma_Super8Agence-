/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import './styles/app.css';

// $ = 'jQuery';

// require('select2')
// $('select').select2()
import $ from 'jquery';



import 'select2';


$('select').select2();




// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';




console.log('Hello Webpack Encore! Edit me in assets/app.js');