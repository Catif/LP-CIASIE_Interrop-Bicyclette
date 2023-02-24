import Settings from "./settings.js";

var map;
var userMarker;
var user;

async function init() {
	user = await _searchUserByIP();
	if (user.city != Settings.rangeCity) {
		let defaultMap = await _getGeocodingOf(Settings.location);
		_createMap([defaultMap.lat, defaultMap.lon], Settings.zoom);
	} else {
		_createMap([user.lat, user.lon], Settings.zoom);
	}

	userMarker._icon.style.filter = "hue-rotate(180deg)";
	userMarker.bindPopup("Vous êtes ici ! (environ)");

	_showByciclesMarker();
}

async function _searchUserByIP(ip = "") {
	var url = "https://ipapi.co/xml/" + ip;

	const response = await fetch(url);
	const data = await response.text();

	if (response.ok) {
		const parser = new DOMParser();
		const xml = parser.parseFromString(data, "text/xml");

		return {
			city: xml.querySelector("city").textContent,
			region: xml.querySelector("region").textContent,
			country: xml.querySelector("country").textContent,
			lat: xml.querySelector("latitude").textContent,
			lon: xml.querySelector("longitude").textContent,
		};
	}
}

async function _getGeocodingOf(name) {
	let url = "https://api.geoapify.com/v1/geocode/search?text=" + name + "&format=xml&apiKey=" + Settings.geoapify.apiKey;

	const response = await fetch(url);
	const data = await response.text();

	if (response.ok) {
		const parser = new DOMParser();
		const xml = parser.parseFromString(data, "text/xml");

		return {
			lat: xml.querySelector("lat").textContent,
			lon: xml.querySelector("lon").textContent,
		};
	}
}

async function _createMap(lonLat, zoom) {
	map = L.map("mapid").setView(lonLat, zoom);
	userMarker = L.marker(lonLat, {}).addTo(map);

	L.tileLayer(Settings.tiles.url, {
		maxZoom: Settings.tiles.maxZoom,
		subdomains: Settings.tiles.subdomains,
		attribution: '&copy; <a href="https://google.fr/maps">Google Maps</a>',
	}).addTo(map);
}

async function _getDataBycicle() {
	// Trouver aucune api en xml pour cette partie
	let url = "https://api.jcdecaux.com/vls/v1/stations?contract=" + Settings.rangeCity + "&apiKey=" + Settings.jcdecaux.apiKey;

	const response = await fetch(url);

	if (response.ok) {
		const data = await response.json();
		return data;
	}
}

async function _showByciclesMarker() {
	const bycicles = await _getDataBycicle();

	bycicles.forEach((bycicle) => {
		let marker = L.marker([bycicle.position.lat, bycicle.position.lng], {}).addTo(map);
		marker.bindPopup(
			"Station n°" +
				bycicle.number +
				" : " +
				bycicle.name +
				"<br>Places disponibles : " +
				bycicle.available_bike_stands +
				"<br>Vélos disponibles : " +
				bycicle.available_bikes
		);
	});
}

export default {
	init,
};
