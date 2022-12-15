ymaps.ready(function () {
    if(typeof mapObjects !== 'undefined'){
        let data = mapObjects;

        let places = {
            "type": "FeatureCollection",
            features: []
        };
        let img ='';
        for (let i=0;data.length > i ;i++){
            if(data[i].thumbnail){
                img = '<div class="flex justify-center"><img src="' + data[i].thumbnail + '" width="120"></div> <br/>';
            }else{
                img = ''; 
            }
            places.features.push({
                "type" : "Feature",
                "id"  : i,
                "geometry": {
                    "type": "Point", 
                    "coordinates": data[i].coordinates.split(',')
                }, "properties": {
                    "balloonContent": data[i].title,
                    "balloonContentHeader": '<a href="/places/' + data[i].slug +' ">' + data[i].title + '</a><br>', 
                    "balloonContentBody": img + '<span class="description">' + data[i].description + '</span>',
                    "balloonContentFooter": '',
                    "hintContent": data[i].title
                },"options": {
                    "iconLayout": 'default#image',
                    "iconImageHref": '/images/services/map-icon-v2.png',
                    "iconImageSize": [30, 44],
                    "iconImageOffset": [-15, -44]
                }
            });
        };
        //Создаем типы записей
    
        var myMap = new ymaps.Map('map', {
            center: center,
            zoom: 8,
            controls:['zoomControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),
        objectManager = new ymaps.ObjectManager();
        myMap.geoObjects.add(objectManager);
        objectManager.add(places);
    }
});
