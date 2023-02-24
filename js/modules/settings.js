export default {
	// https://geoapify.com/
	geoapify: {
		apiKey: "cccb99b51ef64365a4e70e1c13e9fb00",
	},
	// https://developer.jcdecaux.com/
	jcdecaux: {
		apiKey: "f4084b85c3bb949e1d9feaba810dabc4f10b88e4",
	},

	location: "IUT Nancy-Charlemagne, Nancy, France",
	rangeCity: "Nancy",
	zoom: 13,
	tiles: {
		url: "https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
		maxZoom: 20,
		subdomains: ["mt0", "mt1", "mt2", "mt3"],
	},
};
