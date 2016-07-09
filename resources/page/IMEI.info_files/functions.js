// vim: set ts=4 sw=4 :
String.prototype.asInteger = function() { var l = parseInt(this, 10); return (isNaN(l)) ? 0 : l; };
Number.prototype.asInteger = function() { return (isNaN(this)) ? 0 : this; };

var tel_count = 0;
var f_ch_to = 0;
var xhr;
var timeout;

function e(id) {
	return document.getElementById(id);
}

function getPosition(e) {
	var pleft = 0; var ptop = 0;
	if (e.offsetParent) {
		do {
			pleft += e.offsetLeft + ((e.currentStyle) ? e.currentStyle.borderLeftWidth.asInteger() : 0);
			ptop += e.offsetTop + ((e.currentStyle) ? e.currentStyle.borderTopWidth.asInteger() : 0);
		} while (e = e.offsetParent);
	}

	return { x: pleft, y: ptop };
}


function clearField(id, dflt) {
	var field = e(id);
	if ( field.value == dflt ) {
		field.value = '';
	}
}

function setInner(html, id) {
	e(id).innerHTML = html;
}

function getAllBrands(ev) {
	ev.returnValue = false;

	setInner('<b>' + loading_msg + '</b>', 'brandslink');
	var a = Ajax(LANGUAGE + '/ajax/brands.html', document.location);
	a.onSuccess = function () { setInner(this.HTTP.responseText, 'brands'); }
	a.GET();

	return false;
}

function porUsun(evnt, id) {
	evnt.returnValue = false;

	var a = Ajax(LANGUAGE + '/ajax/porownaj-usun-' + id + '.html');
	loadingShow('pcont', '');
	a.onSuccess = function () {
		loadingHide('pcont');
		setInner(this.HTTP.responseText, 'pcont');
	}
	a.GET();
	return false;
}

function sendComment(evnt, id) {
	evnt.returnValue = false;
	e('send').disabled = true;
	e('send').innerHTML = sending_msg;

	var a = Ajax(LANGUAGE + '/ajax/komentarze-' + id + '.html');
	loadingShow('c2komentarze', sending_msg);
	a.onSuccess = function () {
		loadingHide('c2komentarze');
		setInner(this.HTTP.responseText, 'c2komentarze');
	};
	var rodzaj = '0';
	if (e('id_rodzaj_poz').checked) rodzaj = '+';
	if (e('id_rodzaj_neg').checked) rodzaj = '-';
	a.AddPOSTParam('komentarz', e('id_komentarz').value);
	a.AddPOSTParam('rodzaj', rodzaj);
	var podpis = document.getElementById('id_podpis');
	if (podpis){
		a.AddPOSTParam('podpis', e('id_podpis').value);
	}
	var captcha = document.getElementById('id_captcha');
	if (captcha){
		a.AddPOSTParam('captcha', e('id_captcha_key').value);
		a.AddPOSTParam('captcha', e('id_captcha').value);
	}
	a.POST();

	return false;
}

function getOceny(evnt, id) {
	evnt.returnValue = false;

	var a = Ajax(LANGUAGE + '/ajax/oceny-' + id + '.html', document.location);
	loadingShow('ocena', loading_msg);
	a.onSuccess = function () {
		loadingHide('ocena');
		setInner(this.HTTP.responseText, 'ocena');
		slider_new(e('id_ocena_wy_kn'), 1, 10, 0, 68, e('id_ocena_wy'));
		slider_new(e('id_ocena_ja_kn'), 1, 10, 0, 68, e('id_ocena_ja'));
		slider_new(e('id_ocena_mo_kn'), 1, 10, 0, 68, e('id_ocena_mo'));
	}
	a.GET();

	return false;
}

function sendOceny(evnt, id) {
	evnt.returnValue = false;

	setInner(sending_msg, 'ocenabtn');
	loadingShow('ocena', '');
	var a = Ajax(LANGUAGE + '/ajax/oceny-' + id + '.html', document.location);
	a.onSuccess = function () {
		loadingHide('ocena');
		setInner(this.HTTP.responseText, 'ocena');
	}
	a.AddPOSTParam('wyglad', e('id_ocena_wy').value);
	a.AddPOSTParam('jakosc', e('id_ocena_ja').value);
	a.AddPOSTParam('mozliwosci', e('id_ocena_mo').value);
	a.POST();

	return false;
}

function addclass(a, klass) {
	var a = e('t_'+a);
	a.className = a.className + ' ' + klass;
}

function removeclass(a, klass) {
	var re = new RegExp('\\s?'+klass, 'g');
	var a = e('t_'+a);
	a.className = a.className.replace(re, '');
}

function pageNumerate() {
	// this is on load, check location first:
	if (window.location.hash.substr(1) != '') {
		parse_location();
	}

	var list = document.getElementsByTagName('div');
	var pagelist = '';
	var pn = 0;
	tel_count = 0;
	for (var i=0; i < list.length; i++) {
		if (list[i].className == 'page') {
			pn += 1;
			list[i].setAttribute('id', 'page_' + pn);
		}
		if (list[i].className.match(/tel(\s|")/)) {
			tel_count++;
		}
	}
	total_pages = pn;
	page = pageGet()

	if (tel_count > 0) {
		e('pn').innerHTML = pageNumbering(page);
		pageSwitch(page);
		e('strony').style.display = 'block';
		e('sorter').style.display = 'block';
		if ( pn > 1 ) {
			e('shortnav').innerHTML = pageNumberingShort(page);
			e('shortnav').style.display = 'inline';
		}
		pageSorter();
	} else {
		e('strony').style.display = 'none';
		e('shortnav').style.display = 'none';
		e('sorter').style.display = 'none';
	}
}

function pageGet() {
	var loc = document.location;
	loc = loc + '';
	var match = loc.match(/#page(\d+)/);
	if (match) {
		try { return parseInt(match[1]); }
		catch(e) { return 1; }
	} else {
		return 1;
	}
}

function pageSwitch(num) {
	var list = document.getElementsByTagName('div');
	for (var i=0; i < list.length; i++) {
		if (list[i].className == 'page') {
			id = list[i].getAttribute('id');
			list[i].style.display = (id == ('page_'+num)) ? 'inline' : 'none';
			if (id == ('page_'+num)) {
				pageEnableImages(list[i]);
			}
		}
	}
	e('pn').innerHTML = pageNumbering(num);
	e('shortnav').innerHTML = pageNumberingShort(num);
}

function pageEnableImages(node) {
	var list = node.childNodes;
	for (var i=0; i < list.length; i++) {
		try {
			img = list[i].childNodes[0].childNodes[0].childNodes[0];
			try {
				var src = img.getAttribute('longdesc');
				if (src) img.src = src;
			} catch (e) {};
			makeDraggable(img, list[i].id, img.alt, img.src);
		} catch (e) {};
	}
}

function pageNumbering(sel) {
	var str = '';
	var max = total_pages;
	try { page_size = parseInt(page_size); }
	catch(e) { page_size = 1; }
	try { tel_count = parseInt(tel_count); }
	catch(e) { tel_count = 1; }

	for (var i=1; i <= max; i++) {

		from = (i-1) * page_size+1;
		to = i * page_size;
		if (to > tel_count) { to = tel_count; }

		str += ' <nobr>';

		if (i != sel) {
			str += pageLink(i, from + '-' + to);
		} else {
			str += ' <b class="button">' + from + '-' + to + '</b>';
		}
		str += '</nobr>';
	}
	return str;
}

function pageLink(i, title, enabled) {
	if (enabled == null) { enabled = true; }
	return ' <a class="button' + ((enabled) ? '' : ' disabled') + '" href="#' + ((i>1) ? ('page' + i) : '') + '" onClick="' + ((enabled) ? 'pageSwitch(' + i + ');' : 'function(e) {e.returnValue=false; return false;}') + '">' + title + '</a>';
}

function pageSorter() {
	var str = '';
	for(var i=0; i<orders.length; i++) {
		if (orders[i][0] == sort_order) {
			str = str + ' <b class="button">';
		} else {
			str = str + ' <a class="button" href="#" onclick="set_sort(\'' + orders[i][0] + '\'); event.returnValue = false; event.preventDefault(); return false;">';
		}
		str = str + orders[i][1];
		if (orders[i][0] == sort_order) {
			str = str + '</b>';
		} else {
			str = str + '</a>';
		}
	}
	e('sorter').innerHTML = str;
}

function pageNumberingShort(i) {
	var str = '';
	var max = total_pages;

	try { page_size = parseInt(page_size); }
	catch(e) { page_size = 1; }
	try { tel_count = parseInt(tel_count); }
	catch(e) { tel_count = 1; }

	str += pageLink(1, '<b>&laquo;</b>', (i>1));
	str += pageLink(i-1, '<b>&lsaquo;</b>', (i>1));

	from = (i-1) * page_size+1;
	to = i * page_size;
	if (to > tel_count) { to = tel_count; }
	var pages_total = Math.ceil(tel_count / page_size);

	str += ' <b>' + from + '-' + to + '</b> z <b>' + tel_count + '</b>';

	str += pageLink(i+1, '<b>&rsaquo;</b>', (i<pages_total));
	str += pageLink(pages_total, '<b>&raquo;</b>', (i<pages_total));
	return str;
}

var ch_data = {};
var cbs = [
	'bt', 'gps', 'wf', 'mp', 'f', 'u', 'r', '3', 'kp',
	'qw', '3d', 'ed', 'kem', 'ds', 'lb'];

function f_ch_set(el) {
	ch_data = {};
	if (kategoria == '') {
		var qsearchi = e('qsearchi');
		if ((qsearchi) && (qsearchi.value != marka_i_model)) {
			ch_data['s'] = qsearchi.value;
		}
	}
	ch_data['so'] = sort_order;

	var sel_b = document.getElementById('id_b');
	if (sel_b) {
		var b = sel_b.options[sel_b.selectedIndex].value;
		if (b != '') { ch_data['b'] = b; }
	}

	var sel_os = document.getElementById('id_os');
	var os = sel_os.options[sel_os.selectedIndex].value;
	if (os != '') { ch_data['os'] = os; }

	var sel_mpx = document.getElementById('id_mpx');
	if (el == 'foto') {
		if (!e('id_f').checked) {
			sel_mpx.selectedIndex = 0;
		}
	}
	var mpx = sel_mpx.options[sel_mpx.selectedIndex].value;
	if (mpx != '') {
		ch_data['mpx'] = mpx;
		e('id_f').checked = 'checked';
	}

	var device = e('id_typ');
	if (device && device.value) {
		ch_data['devices'] = device.value;
	}
	for (var sid in cbs) {
		if (e('id_'+ cbs[sid]).checked) ch_data[cbs[sid]] = true;
	}
}
function set_location(el) {
	var location = '#';
	for (var sid in ch_data) {
		if (location != '#') location += ';';
		if (ch_data[sid] === true) {
			location += sid;
		} else {
			location += sid + '=' + ch_data[sid];
		}
	}
	document.location = location;
}
function parse_location() {
	var params = window.location.hash.substr(1).split(';');
	var data = {};
	for (var i in params) {
		var nv = params[i].split('=');
		data[nv[0]] = (nv.length == 1) ? true : nv[1];
	}
	f_ch_set('');
	var change = false;
	var sortchange = false;
	for (var k in data) {
		if (data[k] != ch_data[k]) {
//			console.log(k + ' differs! (' + data[k] + ')');
			change = true;
			if (k == 'so') {
				sortchange = true;
				sort_order = data[k];
			}
			if (['os', 'b', 'mpx', 'devices'].indexOf(k) > -1) {
				var sel = e('id_' + ((k == 'devices') ? 'typ' : k));
				for (var i = 0; i< sel.options.length; i++) {
					if (sel.options[i].value == data[k]) {
						sel.selectedIndex = i;
						break;
					}
				}
			} else if (data[k] === true) {
				e('id_'+ k).setAttribute("checked", "checked");
			}
		}
	}
	for (var i in cbs) {
		if (data[cbs[i]] != ch_data[cbs[i]] && ch_data[cbs[i]] === true) {
			e('id_' + cbs[i]).removeAttribute('checked');
			change = true;
		}
	}
	if (change) {
		if (sortchange) {
			set_sort(data['so']);
		} else {
			f_ch('');
		}
	}
}

function f_ch(el) {
	if (timeout) {
		clearTimeout(timeout);
		loadingHide('lista');
	}
	loadingShow('lista', loading_msg);
	f_ch_set(el);
	set_location(el);
	timeout = setTimeout('f_ch_send(\'' + el + '\')', 1500);
}

function f_ch_send(el) {
	var a = '';
	if (f_ch_to) window.clearTimeout(f_ch_to);

	if (xhr){
		xhr.abort();
	}

	f_ch_set(el);
	set_location(el);

	if (kategoria != '') {
		a = Ajax(LANGUAGE + '/ajax/qsearch-' + kategoria +'.html', document.location);
	} else {
		a = Ajax(LANGUAGE + '/ajax/qsearch.html', document.location);
	}
	loadingShow('lista', loading_msg);
	try {
		document.getElementById('newsy_posty').style.display = 'none';
	} catch (e) {};
	for (var sid in ch_data) {
		if (ch_data[sid] === true) {
			a.AddGETParam(sid, 't');
		} else {
			a.AddGETParam(sid, ch_data[sid]);
		}
	}

	a.onSuccess = function () {
		loadingHide('lista');
		setInner(this.HTTP.responseText, 'lista');
		pageNumerate();
	}
	a.GET();
	xhr = a.HTTP;

	return false;
}

function f_ch_ie() {
	if (document.all) {
		if (f_ch_to) window.clearTimeout(f_ch_to);
		f_ch_to = window.setTimeout(f_ch, 100);
	}
}

function set_sort(sort) {
	sort_order = sort;
	f_ch();
//	console.log('false');
	return false;
}

function loadingShow(for_id, msg, dx, dy) {
	var div = e(for_id);
	if (div == null) return false;

	if (!div.loader) {
		// create loader for that div:
		div.loader = document.createElement('div');
		div.loader.id = for_id + '_loader';
		div.loader.className = 'loader';
		div.loader.style.display = 'none';
		e('container').insertBefore(div.loader, e('container').firstChild);
	}
	// show loader
	if (msg == null) msg = loading_msg;
	if (dx == null) dx = 0;
	if (dy == null) dy = 0;
	div.loader.innerHTML = '<img src="/gfx/indicator.gif" alt="" /> ' + msg;
	var pos = getPosition(div);
	if (div.loader.style && (typeof(div.loader.style.left) == 'string')) {
		div.loader.style.left = (pos.x + 2 + dx) + 'px';
		div.loader.style.top = (pos.y + 2 + dy) + 'px';
	} else if (div.loader.style) {
		div.loader.style.left = pos.x + 2 + dx;
		div.loader.style.top = pos.y + 2 + dy;
	}
	div.loader.style.display = 'block';
}

function loadingHide(for_id) {
	var div = e(for_id);
	if (div == null) return false;
	if (div.loader) div.loader.style.display = 'none';
	return false;
}

function gen_cd(imei) {

    var step2 = 0;
    var step2a = 0;
    var step2b = 0;
    var step3 = 0;

    // add zero's till the length is 14
    for(var i=imei.length; i < 14; i++)
    imei = imei + "0";

    for(var i=1; i<14; i=i+2) {
    var step1 = (imei.charAt(i))*2 + "0";
    // add the individual digits of the numbers calculates in step 1
    step2a = step2a + parseInt(step1.charAt(0)) + parseInt(step1.charAt(1));
    }

    // add together all the digits on an even position
    for(var i=0;i<14;i=i+2)
    step2b = step2b + parseInt(imei.charAt(i));

    step2 = step2a + step2b;

    // if the last digit of step2 is zero then the Luhn digit is zero
    if ( step2 % 10 == 0) step3 = 0;
    // otherwise find the nearest higher number ending with a zero
    else
    step3 = 10 - step2 % 10;

    return step3;
}