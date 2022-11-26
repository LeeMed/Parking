

const cities = document.querySelectorAll(".city");
const allParkings = document.querySelectorAll(".parking");
let selectedParking = null;


function showParking(cityDOM){
    Object.keys(cityDOM.children[0].children).forEach( (key) => {
        const parking = cityDOM.children[0].children[key];
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


citiesEvent();