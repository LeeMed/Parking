

const cities = document.querySelectorAll(".city-button");
const allParkings = document.querySelectorAll(".parking");
const parkingButtons = document.querySelectorAll(".parking-button");
const allPlaces = document.querySelectorAll(".place");
let selectedParking = null;
let selectedPlace = null;


function showParking(cityDOM){
    Object.keys(cityDOM.parentElement.children[1].children).forEach( (key) => {
        const parking = cityDOM.parentElement.children[1].children[key];
        parking.style.display = "Block";
        selectedParking = cityDOM;
    });
}

function hideParkings(){
    Object.keys(allParkings).forEach( (key) => {
        const parking = allParkings[key];
        parking.style.display = "none";
    });
}

function citiesEvent(){
    Object.keys(cities).forEach( (key) => {
        cities[key].addEventListener('click', () => {
            hideParkings();
            if (selectedParking == cities[key]){
                selectedParking = null;
            }
            else{
                showParking(cities[key]);
            };
        });
    });
}

function hidePlaces(){
    Object.keys(allPlaces).forEach( (key) => {
        const place = allPlaces[key];
        place.style.display = "none";
    });
}

function showPlace(parkingDOM){
    Object.keys(parkingDOM.parentElement.children[1].children).forEach( (key) => {
        const place = parkingDOM.parentElement.children[1].children[key];
        console.log(place);
        place.style.display = "block";
        selectedPlace = parkingDOM;
    });
}

function placesEvent(){
    Object.keys(parkingButtons).forEach( (key) => {
        parkingButtons[key].addEventListener('click', () => {
            hidePlaces();
            if (selectedPlace == parkingButtons[key]){
                selectedPlace = null;
            }
            else{
                showPlace(parkingButtons[key]);
            };
        });
    });
}


document.querySelector('.opener').addEventListener('click', () => {
    if (document.querySelector('.links').classList.contains('isActive')){
        document.querySelector('.links').classList.remove('isActive');
    } else {
        document.querySelector('.links').classList.add('isActive');
    }
});

citiesEvent();
placesEvent();