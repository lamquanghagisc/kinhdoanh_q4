L.Control.Geocoder.PositionStack = L.Class.extend({
    initialize: function(key) {
        this.key = key;
    },

    geocode : function (query, cb, context) {
        L.Control.Geocoder.jsonp('https://api.positionstack.com/v1/forward', {
            query: query,
            access_key : this.key
        }, function(data) {
            var results = [];
            for (var i = data.resourceSets[0].resources.length - 1; i >= 0; i--) {
                var resource = data.resourceSets[0].resources[i],
                    bbox = resource.bbox;
                results[i] = {
                    name: resource.name,
                    bbox: L.latLngBounds([bbox[0], bbox[1]], [bbox[2], bbox[3]]),
                    center: L.latLng(resource.point.coordinates)
                };
            }
            cb.call(context, results);
        }, this, 'jsonp');
    },

    reverse: function(location, scale, cb, context) {
        L.Control.Geocoder.jsonp('http://dev.virtualearth.net/REST/v1/Locations/' + location.lat + ',' + location.lng, {
            access_key : this.key
        }, function(data) {
            var results = [];
            for (var i = data.resourceSets[0].resources.length - 1; i >= 0; i--) {
                var resource = data.resourceSets[0].resources[i],
                    bbox = resource.bbox;
                results[i] = {
                    name: resource.name,
                    bbox: L.latLngBounds([bbox[0], bbox[1]], [bbox[2], bbox[3]]),
                    center: L.latLng(resource.point.coordinates)
                };
            }
            cb.call(context, results);
        }, this, 'jsonp');
    }
});

L.Control.Geocoder.bing = function(key) {
    return new L.Control.Geocoder.Bing(key);
};