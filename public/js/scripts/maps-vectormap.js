// jvector Map
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
$(document).ready(function() {

    $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#usa-map-markers').vectorMap({
        map: 'us_aea_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#argentina-map').vectorMap({
        map: 'ar_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#australia-map').vectorMap({
        map: 'au_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#germany-map').vectorMap({
        map: 'de_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#north-america-map').vectorMap({
        map: 'north_america_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

    $('#uk-map').vectorMap({
        map: 'uk_countries_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: '#fff',
        regionsSelectable: true,
        markersSelectable: true,
        markerStyle: {
            initial: {
                fill: '#a288d5',
            }
        },
        regionStyle: {
            initial: {
                fill: '#C8EEFF'
            },
            hover: {
                "fill-opacity": 0.3
            }
        },
    });

});