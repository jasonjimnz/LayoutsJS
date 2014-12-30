LayoutsJS Alpha 1.0

LayoutsJS is a light-weight MVC (Model View Controller), plugin for jQuery that provides layout rendering and REST API connection, making easy any screen change and retrieving data from server.

This plugin requires jQuery (Tested with jQuery 1.9) and it has been developed to be used in Apache Cordova (A.K.A Phonegap) to simplify the development processs and also to use less code.

-Usage:
	After loading jQuery initialize the plugin.
	$(document).ready(funciton(){
		layjs.init();
	});

	There is some variables saved to be used with this plugin:

	lastScreen : To provide a correct back function.
	layjsClassHide : To provide a class that hides the layouts
	model : Restricted to shortcut the model functions
	view : Restricted to shortcut the view functions
	cont: Restricted to shortcut the controller functions
	newLay: Restricted to shortcut the layout change function
	layjsUrl: URL that you should override if you are gonna do API calls
	layouts: Is the array of screens, this contains all the screens of your 	webapp

	To add layouts to the array, you have to put in the tag that contains your layout the class "layjs" and then the name of the class that you will use to identify it. NOTE: The home class will be the main screen so, that screen will not be hidden at the web starts

	Example:
	<div class="layjs home">
		The Home and main screen
	</div>

	<div class="layjs page1">
		The non home screen that will be hidden at page loading
	</div>

	To change views you have to call to the view funciton to use the plugin:
	view.change(TypeScreen, DestinationLayout, CallBackOK, ScreenFile, DataOfScreen);

	TypeScreen (string): Required
		"internal" //A layout inside the HTML
		"external" //A layout outside the HTML (Ajax call)

	DestinationLayout(string): Required // Class or id where the layout will be loaded

	CallBackOK (function) : Required or null // Function that loads when everything is OK

	ScreenFile (string/object): Required or null if typeScreen is internal //the layout or file where the layout is located

	DataOfScreen (function): Optional // Data or functions to load with the layout

	To change layouts using the internal way you have to call the change funciton that are included in the view: view.change("internal",".yourLayoutClass"); // You can call the function without defining the other function's parameters.

	Using the model API connection:

	To get connection with an external database or to a webservice you can use the model, that simplifies the calling process.

	model.api(method, sendData, callbackOK, callbackFail);

	Methods (string): GET, POST, PUT, DELETE

	sendData (object): //Required contains API conneciton data {
		urlDestiny: "/routeCall", //Required to make a API Call
		json: {"data":"data"}, //Required if method equals to post or put
		basicAuth: "user:pass" //Optional, required if you are going to use Basic Auth
		beforeSendFunction: function() //Optional, required if you want to execute some actions before the call will be executed
	}

	callbackOK: Function(response);
		A function that will be executed when everything went OK.

		For callbackOK you can use the response var to use the json that you have recieve in the server response

	callbackFail: Function();
		A function that will be executed when something goes worng and the server responds with an error code.

	Example: model.api(
			"POST",
			{urlDestiny:"api/log", 
				json:'{"user":"usr","pass":"pass"',
				basicAuth:"usr:pass", 
				beforeSendFunction: window.alert("SENT")
			},
			function(){
				window.alert("Api connect OK");
			},
			function(){
				window.alert("Api could'n connect");
			});