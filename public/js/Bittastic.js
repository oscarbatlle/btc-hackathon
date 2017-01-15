BitTastic={
	init:function(){
		BitTastic.initCom();
	},
	initCom:function(){
		if (window.addEventListener) {
			// For standards-compliant web browsers
			window.addEventListener("message", BitTastic.receiveMessage, false);
		}
		else {
			window.attachEvent("onmessage", BitTastic.receiveMessage);
		}
	},
	sendMessage:function(message){
		parent.postMessage(message,"*");  //  `*` on any domain         
	},
	receiveMessage:function(event){
		console.log(event.message);//Do somehting. 
	}
}