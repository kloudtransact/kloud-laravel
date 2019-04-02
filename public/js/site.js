// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
$('.shop-categories-linkk').click(function(e){
	e.preventDefault();
	let c = $(this).attr('data-cat');
	console.log("Category: " + c);
});