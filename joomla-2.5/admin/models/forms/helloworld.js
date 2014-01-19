/**
 *	helloworld : Validate
 *	Filename : helloworld.js
 *
 *	Author : Caleb Nance
 *	Component : Hello World
 *
 *	Copyright : Copyright (C) 2013. All Rights Reserved
 *	License : GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 *
 **/
window.addEvent('domready', function() {
	document.formvalidator.setHandler('title',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('category',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
});