// Create a namespace for TheCity if we ain't got one
if (TheCity == null || typeof(TheCity) != "object") { var TheCity = {}; }

TheCity.PluginHelper = function() {
	
	var checkjQuery = fucntion() {
		if (jQuery) return true;
		alert('jQuery is is required for tc-plugin-helper.js. You can add this to your html to fix this issue. <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>');
		return false;
	};
	
	// Cross Domain Post Message 
	var cache_bust = 1, window = this;
	var crossDomainPostMessage = function(message, target_url, target) {
		if (!target_url) return;
		target = target || parent;
		if (window['postMessage']) target['postMessage'](message, target_url.replace( /([^:]+:\/\/[^\/]+).*/, '$1'));
		else if (target_url) target.location = target_url.replace(/#.*$/, '') + '#' + (+new Date) + (cache_bust++) + '&' + message;
	};
	
    return {
		// resize the containing IFrame to be tall enough to display all the content
		// in the cild documemnt
		initPlugin: function(subdomain) {
			if (!checkjQuery()) return ; // do not need this check in here but the parent eample uses it.
			var src = 'https://' + subdomain + '.onthecity.org/#' + encodeURIComponent(document.location.href);
			var documentHeight = $(document).height();
			crossDomainPostMessage(documentHeight, src, frames[0]);
		}
    };
}();