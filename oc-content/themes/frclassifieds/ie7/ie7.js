/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'pixafonts\'">' + entity + '</span>' + html;
	}
	var icons = {
		'px-close': '&#xe900;',
		'px-add': '&#xe904;',
		'px-book': '&#xe901;',
		'px-briefcase': '&#xe902;',
		'px-car': '&#xe903;',
		'px-enter': '&#xe905;',
		'px-exit': '&#xe906;',
		'px-headphone': '&#xe907;',
		'px-heart': '&#xe908;',
		'px-house': '&#xe909;',
		'px-locked': '&#xe90a;',
		'px-map-pin': '&#xe90b;',
		'px-map-pin-o': '&#xe90c;',
		'px-mic': '&#xe90d;',
		'px-notepad': '&#xe90e;',
		'px-paper-bag': '&#xe90f;',
		'px-plus': '&#xe910;',
		'px-tools': '&#xe911;',
		'px-trolley': '&#xe912;',
		'px-unlocked': '&#xe913;',
		'px-user': '&#xe914;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
