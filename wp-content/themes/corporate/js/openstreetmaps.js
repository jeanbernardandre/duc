
const longCanada = 44.292538;
const latCanada = -71.235352;
const longEurope = 46.00284325773779;
const latEurope = 4.695495688554427;
const zoomEurope = typeDevice === 'mobile' ? 7 : 8.4;
const zoomCanada = typeDevice === 'mobile' ? 7 : 7;
console.log(baseDirectory + '/assets/dist/img/map-marker-2.png');
function iconType(type) {
    let iconType = '';
    if (type === 'Camping') {
        iconType = L.icon({
            iconUrl: baseDirectory + '/assets/dist/img/map-marker-2.png',
            iconSize: [22, 31],
            iconAnchor: [11, 31],
            popupAnchor: [0, -46]
        })
    } else {
        iconType = L.icon({
            iconUrl: baseDirectory + '/assets/dist/img/map-marker-1.png',
            iconSize: [22, 31],
            iconAnchor: [11, 31],
            popupAnchor: [0, -46]
        })
    }

    return iconType;
}


//////OK

document.querySelectorAll('.kali-map').forEach(function(element, index) {
    let markers = L.markerClusterGroup({
        iconCreateFunction: function (cluster) {
            let count = cluster.getChildCount();
            let digits = (count + '').length;
            return L.divIcon({
                html: count,
                className: 'mycluster digits-' + digits,
                iconSize: null
            });
        },
        spiderfyOnMaxZoom: false,
        showCoverageOnHover: false,
        zoomToBoundsOnClick: false,
        disableClusteringAtZoom: 8
    });

    let kaliMapCampings = element.dataset.mapCampings ? JSON.parse(element.dataset.mapCampings) : [];
    let kaliInfoWindowContentCampings = element.dataset.infoCampings ? JSON.parse(element.dataset.infoCampings) : [];

    mapCenter = L.latLng(longEurope, latEurope);
    zoomBlog = zoomEurope;
    let map = L.map(element, {
        center: mapCenter,
        zoom: zoomBlog,
        layers: [L.tileLayer('https://cartodb-basemaps-b.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })],
        zoomSnap: 0.2
    });
    setTimeout(map.invalidateSize.bind(map), 100);

/*    console.log('kaliMapCampings');
    console.log(typeof(kaliMapCampings));*/
    if (Array.isArray(kaliMapCampings) && kaliMapCampings.length)  {
        kaliMapCampings.forEach(function (village, index) {
            let markerOptions = {
                name: village[0],
                content: kaliInfoWindowContentCampings[index],
                clickable: true,
                icon: L.icon({
                    iconUrl: baseDirectory + '/assets/dist/img/map-marker-2.png',
                    iconSize: [22, 31],
                    iconAnchor: [11, 31],
                    popupAnchor: [0, -31]
                }),
                type: 'camping'
            }
            let marker = L.marker(L.latLng(village[1], village[2]), markerOptions).addTo(markers).on('click', (e) => interactK(e, markerOptions));
            marker.bindPopup('<p class="bulle-title"><a href="' + village[3] + '">' + village[0] + '</a></p>');
        });
    }

    markers.on('clusterclick', function(e) {
        let cluster = e.layer;
        if (map.getBoundsZoom(cluster.getBounds()) === map.getMaxZoom()) {
            cluster.spiderfy();
        } else {
            cluster.zoomToBounds({
                padding: [45, 45]
            });
        }
    });
    map.addLayer(markers);

    document.querySelectorAll('.kali-menu-items .menu-item').forEach(button =>
        button.addEventListener('click', () => setTimeout(map.invalidateSize.bind(map), 100))
    );
});


function interactK(element, markerOptions) { // les fonctions qui envoient vers l'autre div
/*    let divDest = element.target._map._container.parentNode.parentNode.lastElementChild;
    let className = '-' + markerOptions.type;*/
/*    divDest.classList.remove('-camping');
    divDest.classList.remove('-village');*/
/*    divDest.classList.add(className);
    divDest.innerHTML = markerOptions.content;*/
}

let campingOn = true;
let mapId = typeof pageId !== 'undefined' ? 'map-' + pageId : 'map';

if (
    document.getElementById('map_dest') !== null ||
    document.getElementById(mapId)
) {
    if (document.getElementById('map_dest')) {
        mapDiv = 'map_dest';
        zoom = zoomEurope;
        mapCenter = L.latLng(longEurope, latEurope);
    } else if (document.getElementById(mapId)) {
        mapDiv = mapId;
        mapCenter = blogId === 1 ? L.latLng(longEurope, latEurope) : L.latLng(longCanada, latCanada);
        zoom = blogId === 1 ? zoomEurope : zoomCanada;
    } else {
        mapDiv = 'map_dest_ca';
        zoom = zoomCanada;
        mapCenter = L.latLng(longCanada, latCanada);
        campingOn = false;
    }
    let map = L.map(mapDiv, {
        center: mapCenter,
        zoom: zoom,
        layers: [L.tileLayer('https://cartodb-basemaps-b.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })],
        zoomSnap: 0.25
    });
    setTimeout(map.invalidateSize.bind(map), 100);

    let btnVillages = document.getElementById('btnVillages');
    let btnCampings = document.getElementById('btnCampings');

    if (typeof destinations !== 'undefined') {
        let markerVillageObjects = [];
/*        markerBind(map, destinations.villages, 'Village', markerVillageObjects);
        let markerCampingObjects = [];
        markerBind(map, destinations.campings, 'Camping', markerCampingObjects);*/

        if (markerVillageObjects.length === 0) {
            campingOn = false;
           // changeIcon();
            if (btnCampings !== null || btnVillages !== null) {
                btnVillages.hidden = true;
                btnCampings.classList.add('active');
                btnCampings.classList.remove('pull-right');
            }
            if (document.getElementById('sectionMap') !== null) {
                document.getElementById('sectionMap').style.backgroundColor = '#8CC63F';
            }
            if (document.querySelector('#list-villages') !== null) {
                document.querySelector('#list-campings').classList.add('active');
            }
        }
        if (markerCampingObjects.length === 0) {
            campingOn = true;
            //changeIcon();
            if (btnCampings !== null || btnVillages !== null) {
                btnCampings.hidden = true;
                btnVillages.classList.add('active');
                btnVillages.classList.remove('pull-left');
            }
            if (document.getElementById('sectionMap') !== null) {
                document.getElementById('sectionMap').style.backgroundColor = '#1E4D3A';
            }
            if (document.querySelector('#list-villages') !== null) {
                document.querySelector('#list-villages').classList.add('active');
            }
        }
    }
/*
    if (btnVillages !== null || btnCampings !== null) {
        btnVillages.addEventListener('click', changeIcon);
        btnCampings.addEventListener('click', changeIcon);
    }*/
}

/*function markerBind(map, object, type, markerObjects) {
    if (object.length > 0) {
        icon = type === 'Camping' ? '2' : '1';
        object.forEach(function (camping) {
            let markerOptions = {
                name: camping.name,
                url: camping.url,
                region: camping.region,
                clickable: true,
                icon: L.icon({
                    iconUrl: baseDirectory + '/img/map-marker-' + icon + '.png',
                    iconSize: [22, 31],
                    iconAnchor: [11, 31],
                    popupAnchor: [0, -46]
                })
            }
            let marker = L.marker(camping.geo, markerOptions).addTo(map);
            marker.bindPopup('<p class="bulle-title"><a href="' + camping.url + '">' + camping.name + '</a></p><p>' + camping.region + '</p>');
            markerObjects.push(marker);
        });
    }
}*/

/*

function changeIcon() {
    let LeafIcon = L.Icon.extend({
        options: {
            iconSize: [22, 31],
            iconAnchor: [11, 31],
            popupAnchor: [0, -46]
        }
    });
    let lightGreenIconHideE = LeafIcon.extend({
        options: {
            iconUrl: baseDirectory + '/img/map-marker-2-hide.png'
        }
    });
    let lightGreenIconE = LeafIcon.extend({
        options: {
            iconUrl: baseDirectory + '/img/map-marker-2.png'
        }
    });
    let darkGreenIconHideE = LeafIcon.extend({
        options: {
            iconUrl: baseDirectory + '/img/map-marker-1-hide.png'
        }
    });
    let darkGreenIconE = LeafIcon.extend({
        options: {
            iconUrl: baseDirectory + '/img/map-marker-1.png'
        }
    });
}
*/
/*

if (campingOn === true && typeof(markerVillageObjects) !== 'undefined' && typeof(markerCampingObjects) !== 'undefined') {
    markerCampingObjects.forEach(function (camping) {
        camping.setIcon(new lightGreenIconHideE);
    });
    markerVillageObjects.forEach(function (village) {
        village.setIcon(new darkGreenIconE);
    });
    campingOn = false;
} else if (campingOn === false && typeof(markerVillageObjects) !== 'undefined' && typeof(markerCampingObjects) !== 'undefined') {
    markerCampingObjects.forEach(function (camping) {
        camping.setIcon(new lightGreenIconE);
    });
    markerVillageObjects.forEach(function (village) {
        village.setIcon(new darkGreenIconHideE);
    });
    campingOn = true;
}
*/

/*
function interact(e, markerOptions) {
    let divDest = document.getElementById('pointInteret');
    divDest.querySelector('.bloc-image img').src = markerOptions.image;
    divDest.querySelector('#pointInteret h3.title').innerHTML = markerOptions.name;
    divDest.querySelector('.block-text').innerHTML = markerOptions.text;
    if (markerOptions.link !== '' && divDest.querySelector('.point-cta') !== null) {
        divDest.querySelector('.point-cta a').href = markerOptions.link;
        divDest.querySelector('.point-cta a span').textContent = markerOptions.label;
    } else if (divDest.querySelector('.point-cta') !== null) {
        divDest.querySelector('.point-cta').innerHTML('<a href="' + markerOptions.link + '" class="btn btn-cta" title="">' +
            '<i class="icon-cta"></i>' +
            '<span>' + markerOptions.label + '</span>' +
            '</a>');
    }
}

*/
